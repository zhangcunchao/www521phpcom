/**
 * @module editor
 * @description <p>The Rich Text Editor is a UI control that replaces a standard HTML textarea; it allows for the rich formatting of text content, including common structural treatments like lists, formatting treatments like bold and italic text, and drag-and-drop inclusion and sizing of images. The Rich Text Editor's toolbar is extensible via a plugin architecture so that advanced implementations can achieve a high degree of customization.</p>
 * @namespace YAHOO.widget
 * @requires yahoo, dom, element, event, container_core, simpleeditor
 * @optional dragdrop, animation, menu, button, resize
 */

(function() {
var Dom = YAHOO.util.Dom,
	Event = YAHOO.util.Event,
	Lang = YAHOO.lang,
	Toolbar = YAHOO.widget.Toolbar;

	/**
	 * The Rich Text Editor is a UI control that replaces a standard HTML textarea; it allows for the rich formatting of text content, including common structural treatments like lists, formatting treatments like bold and italic text, and drag-and-drop inclusion and sizing of images. The Rich Text Editor's toolbar is extensible via a plugin architecture so that advanced implementations can achieve a high degree of customization.
	 * @constructor
	 * @class Editor
	 * @extends YAHOO.widget.SimpleEditor
	 * @param {String/HTMLElement} el The textarea element to turn into an editor.
	 * @param {Object} attrs Object liternal containing configuration parameters.
	*/
	
	YAHOO.widget.ivEditor = function(el, attrs) {
		YAHOO.widget.ivEditor.superclass.constructor.call(this, el, attrs);

		this.on('toolbarLoaded', function() {
			this.on('cleanHTML', function(ev) {
				this.get('element').value = this.cleanHtmlForIE(ev.html);
			}, this, true);

			this.on('afterRender', function() {
				var wrapper = this.get('editor_wrapper');
				wrapper.appendChild(this.get('element'));
				this.setStyle('width', '100%');
				this.setStyle('height', '396px');
				this.setStyle('visibility', '');
				this.setStyle('top', '');
				this.setStyle('left', '');
				this.setStyle('position', '');

				this.addClass('editor-hidden');
			}, this, true);
			
			this.on('afterNodeChange', function () {this.cleanHTML();}, this, true);
			this.on('editorKeyUp', function () {this.cleanHTML();}, this, true);
		}, this, true);
	};

	YAHOO.extend(YAHOO.widget.ivEditor, YAHOO.widget.SimpleEditor, {
		/**
		* @private
		* @property _undoCache
		* @description An Array hash of the Undo Levels.
		* @type Array
		*/
		_undoCache: null,
		/**
		* @private
		* @property _undoLevel
		* @description The index of the current undo state.
		* @type Number
		*/
		_undoLevel: null,	
		/**
		* @private
		* @method _hasUndoLevel
		* @description Checks to see if we have an undo level available
		* @return Boolean
		*/
		_hasUndoLevel: function() {
			return ((this._undoCache.length > 1) && this._undoLevel);
		},
		/**
		* @private
		* @method _undoNodeChange
		* @description nodeChange listener for undo processing
		*/
		_undoNodeChange: function() {
			var undo_button = this.toolbar.getButtonByValue('undo'),
				redo_button = this.toolbar.getButtonByValue('redo');
			if (undo_button && redo_button) {
				if (this._hasUndoLevel()) {
					this.toolbar.enableButton(undo_button);
				}
				if (this._undoLevel < this._undoCache.length) {
					this.toolbar.enableButton(redo_button);
				}
			}
			this._lastCommand = null;
		},
		/**
		* @private
		* @method _checkUndo
		* @description Prunes the undo cache when it reaches the maxUndo config
		*/
		_checkUndo: function() {
			var len = this._undoCache.length,
			tmp = [];
			if (len >= this.get('maxUndo')) {
				for (var i = (len - this.get('maxUndo')); i < len; i++) {
					tmp.push(this._undoCache[i]);
				}
				this._undoCache = tmp;
			}
		},
		/**
		* @private
		* @method _putUndo
		* @description Puts the content of the Editor into the _undoCache.
		* //TODO Convert the hash to a series of TEXTAREAS to store state in.
		* @param {String} str The content of the Editor
		*/
		_putUndo: function(str) {
			this._undoCache.push(str);
		},
		/**
		* @private
		* @method _getUndo
		* @description Get's a level from the undo cache.
		* @param {Number} index The index of the undo level we want to get.
		* @return {String}
		*/
		_getUndo: function(index) {
			return this._undoCache[index];
		},
		/**
		* @private
		* @method _storeUndo
		* @description Method to call when you want to store an undo state. Currently called from nodeChange and _handleKeyUp
		*/
		_storeUndo: function() {
			if (this._lastCommand === 'undo' || this._lastCommand === 'redo') {
				return false;
			}
			if (!this._undoCache) {
				this._undoCache = [];
			}
			this._checkUndo();
			var str = this.getEditorHTML();
			var last = this._undoCache[this._undoCache.length - 1];
			if (last) {
				if (str !== last) {
					this._putUndo(str);
				}
			} else {
				this._putUndo(str);
			}
			this._undoLevel = this._undoCache.length;
			this._undoNodeChange();
		},	
		/**
		* @property STR_CLOSE_WINDOW
		* @description The Title of the close button in the Editor Window
		* @type String
		*/
		STR_CLOSE_WINDOW: 'Close Window',
		/**
		* @property STR_CLOSE_WINDOW_NOTE
		* @description A note appearing in the Editor Window to tell the user that the Escape key will close the window
		* @type String
		*/
		STR_CLOSE_WINDOW_NOTE: 'To close this window use the Control + Shift + W key',
		/**
		* @property STR_IMAGE_PROP_TITLE
		* @description The title for the Image Property Editor Window
		* @type String
		*/
		STR_IMAGE_PROP_TITLE: 'Image Options',
		/**
		* @property STR_IMAGE_TITLE
		* @description The label string for Image Description
		* @type String
		*/
		STR_IMAGE_TITLE: 'Description',
		/**
		* @property STR_IMAGE_SIZE
		* @description The label string for Image Size
		* @type String
		*/
		STR_IMAGE_SIZE: 'Size',
		/**
		* @property STR_IMAGE_ORIG_SIZE
		* @description The label string for Original Image Size
		* @type String
		*/
		STR_IMAGE_ORIG_SIZE: 'Original Size',
		/**
		* @property STR_IMAGE_COPY
		* @description The label string for the image copy and paste message for Opera and Safari
		* @type String
		*/
		STR_IMAGE_COPY: '<span class="tip"><span class="icon icon-info"></span><strong>Note:</strong>To move this image just highlight it, cut, and paste where ever you\'d like.</span>',
		/**
		* @property STR_LOCAL_FILE_WARNING
		* @description The label string for the local file warning.
		* @type String
		*/
		STR_LOCAL_FILE_WARNING: '<span class="tip"><span class="icon icon-warn"></span><strong>Note:</strong>This image/link points to a file on your computer and will not be accessible to others on the internet.</span>',
		/**
		* @property STR_LINK_PROP_TITLE
		* @description The label string for the Link Property Editor Window.
		* @type String
		*/
		STR_LINK_PROP_TITLE: 'Link Options',
		/**
		* @property STR_LINK_PROP_REMOVE
		* @description The label string for the Remove link from text link inside the property editor.
		* @type String
		*/
		STR_LINK_PROP_REMOVE: 'Remove link from text',
		/**
		* @property STR_LINK_NEW_WINDOW
		* @description The string for the open in a new window label.
		* @type String
		*/
		STR_LINK_NEW_WINDOW: 'Open in a new window.',
		/**
		* @property STR_LINK_TITLE
		* @description The string for the link description.
		* @type String
		*/
		STR_LINK_TITLE: 'Description',
		/**
		* @property STR_NONE
		* @description The string for the word none.
		* @type String
		*/
		STR_NONE: 'none',
		/**
		* @protected
		* @property CLASS_LOCAL_FILE
		* @description CSS class applied to an element when it's found to have a local url.
		* @type String
		*/
		CLASS_LOCAL_FILE: 'warning-localfile',
		/** 
		* @method init
		* @description The Editor class' initialization method
		*/
		init: function(p_oElement, p_oAttributes) {
			this._windows = {};
			this._defaultToolbar = {
				collapse: true,
				titlebar: 'HTML Editor',
				draggable: false,
				buttonType: 'advanced',
				buttons: [
					{ group: 'fontstyle', label: 'Font Size',
						buttons: [
							{ type: 'spin', label: '0', value: 'fontsize', range: [ -2, 4 ], disabled: true }
						]
					},
					{ type: 'separator' },
					{ group: 'textstyle', label: 'Font Style',
						buttons: [
							{ type: 'push', label: 'Bold CTRL + SHIFT + B', value: 'bold' },
							{ type: 'push', label: 'Italic CTRL + SHIFT + I', value: 'italic' },
							{ type: 'push', label: 'Underline CTRL + SHIFT + U', value: 'underline' }
						]
					},
					{ type: 'separator' },
					{ group: 'textstyle2', label: '&nbsp;',
						buttons: [
							{ type: 'color', label: 'Font Color', value: 'forecolor', disabled: true },
							{ type: 'separator' },
							{ type: 'push', label: 'Remove Formatting', value: 'removeformat', disabled: true }
						]
					},
					{ type: 'separator' },
					{ group: 'undoredo', label: 'Undo/Redo',
						buttons: [
							{ type: 'push', label: 'Undo', value: 'undo', disabled: true },
							{ type: 'push', label: 'Redo', value: 'redo', disabled: true }

						]
					},
					{ type: 'separator' },
					{ group: 'alignment', label: 'Alignment',
						buttons: [
							{ type: 'push', label: 'Align Left CTRL + SHIFT + [', value: 'justifyleft', disabled: true },
							{ type: 'push', label: 'Align Center CTRL + SHIFT + |', value: 'justifycenter', disabled: true },
							{ type: 'push', label: 'Align Right CTRL + SHIFT + ]', value: 'justifyright', disabled: true }
						]
					},
					{ type: 'separator' },
					{ group: 'indentlist2', label: 'List',
						buttons: [
							{ type: 'push', label: 'Create an Unordered List', value: 'insertunorderedlist' }
						]
					},
					{ type: 'separator' },
					{ group: 'insertitem', label: 'Insert Item',
						buttons: [
							{ type: 'push', label: 'HTML Link CTRL + SHIFT + L', value: 'createlink', disabled: true },
							{ type: 'push', label: 'Insert Image', value: 'insertimage' },
							{ type: 'push', label: 'Insert Contact Form', value: 'insertcontactform' }
						]
					},
					{ type: 'separator' },
					{ group: 'htmleditor', label: 'Edit HTML Code',
						buttons: [
							{ type: 'push', label: 'Edit HTML Code', value: 'editcode' } 
						]
					}
				]
			};

			YAHOO.widget.ivEditor.superclass.init.call(this, p_oElement, p_oAttributes);
		},
		_render: function() {
			YAHOO.widget.ivEditor.superclass._render.apply(this, arguments);
			var self = this;
			//Render the panel in another thread and delay it a little..
			window.setTimeout(function() {
				self._renderPanel.call(self);
			}, 800);
		},
		/**
		* @method initAttributes
		* @description Initializes all of the configuration attributes used to create 
		* the editor.
		* @param {Object} attr Object literal specifying a set of 
		* configuration attributes used to create the editor.
		*/
		initAttributes: function(attr) {
			YAHOO.widget.ivEditor.superclass.initAttributes.call(this, attr);

			/**
			* @attribute localFileWarning
			* @description Should we throw the warning if we detect a file that is local to their machine?
			* @default true
			* @type Boolean
			*/			
			this.setAttributeConfig('localFileWarning', {
				value: attr.locaFileWarning || true
			});

		},
		/**
		* @private
		* @method _windows
		* @description A reference to the HTML elements used for the body of Editor Windows.
		*/
		_windows: null,
		/**
		* @private
		* @method _fixNodes
		* @description Fix href and imgs as well as remove invalid HTML.
		*/
		_fixNodes: function() {
			YAHOO.widget.ivEditor.superclass._fixNodes.call(this);
			var url = '';

			var imgs = this._getDoc().getElementsByTagName('img');
			for (var im = 0; im < imgs.length; im++) {
				if (imgs[im].getAttribute('href', 2)) {
					url = imgs[im].getAttribute('src', 2);
					if (this._isLocalFile(url)) {
						Dom.addClass(imgs[im], this.CLASS_LOCAL_FILE);
					} else {
						Dom.removeClass(imgs[im], this.CLASS_LOCAL_FILE);
					}
				}
			}
			var fakeAs = this._getDoc().body.getElementsByTagName('a');
			for (var a = 0; a < fakeAs.length; a++) {
				if (fakeAs[a].getAttribute('href', 2)) {
					url = fakeAs[a].getAttribute('href', 2);
					if (this._isLocalFile(url)) {
						Dom.addClass(fakeAs[a], this.CLASS_LOCAL_FILE);
					} else {
						Dom.removeClass(fakeAs[a], this.CLASS_LOCAL_FILE);
					}
				}
			}
		},
		/**
		* @private
		* @property _disabled
		* @description The Toolbar items that should be disabled if there is no selection present in the editor.
		* @type Array
		*/
		_disabled: [ 'createlink', 'forecolor', 'fontsize', 'removeformat', 'justifyleft', 'justifycenter', 'justifyright' ],
		/**
		* @private
		* @property _alwaysDisabled
		* @description The Toolbar items that should ALWAYS be disabled event if there is a selection present in the editor.
		* @type Object
		*/
		_alwaysDisabled: {  },
		/**
		* @private
		* @property _alwaysEnabled
		* @description The Toolbar items that should ALWAYS be enabled event if there isn't a selection present in the editor.
		* @type Object
		*/
		_alwaysEnabled: {  },
        /**
        * @private
        * @method _handleDoubleClick
        * @param {Event} ev The event we are working on.
        * @description Handles all doubleclick events inside the iFrame document.
        */
        _handleDoubleClick: function(ev) {
            var ret = this.fireEvent('beforeEditorDoubleClick', { type: 'beforeEditorDoubleClick', target: this, ev: ev });
            if (ret === false) {
                return false;
            }
            if (this._isNonEditable(ev)) {
                return false;
            }
            this._setCurrentEvent(ev);
            var sel = Event.getTarget(ev);
            if (this._isElement(sel, 'img') && !(/contactform\W*$/.text(img.src))) {
                this.currentElement[0] = sel;	
                this.toolbar.fireEvent('insertimageClick', { type: 'insertimageClick', target: this.toolbar });
                this.fireEvent('afterExecCommand', { type: 'afterExecCommand', target: this });
            } else if (this._hasParent(sel, 'a')) { //Handle elements inside an a
                this.currentElement[0] = this._hasParent(sel, 'a');
                this.toolbar.fireEvent('createlinkClick', { type: 'createlinkClick', target: this.toolbar });
                this.fireEvent('afterExecCommand', { type: 'afterExecCommand', target: this });
            }
            this.nodeChange();
            this.fireEvent('editorDoubleClick', { type: 'editorDoubleClick', target: this, ev: ev });
        },
		/**
		* @private
		* @method _handleKeyDown
		* @param {Event} ev The event we are working on.
		* @description Override method that handles some new keydown events inside the iFrame document.
		*/
		_handleKeyDown: function(ev) {
			YAHOO.widget.ivEditor.superclass._handleKeyDown.call(this, ev);
			var doExec = false,
				action = null,
				exec = false;

			switch (ev.keyCode) {
				//case 219: //Left
				case this._keyMap.JUSTIFY_LEFT.key: //Left
					if (this._checkKey(this._keyMap.JUSTIFY_LEFT, ev)) {
						action = 'justifyleft';
						doExec = true;
					}
					break;
				//case 220: //Center
				case this._keyMap.JUSTIFY_CENTER.key:
					if (this._checkKey(this._keyMap.JUSTIFY_CENTER, ev)) {
						action = 'justifycenter';
						doExec = true;
					}
					break;
				case 221: //Right
				case this._keyMap.JUSTIFY_RIGHT.key:
					if (this._checkKey(this._keyMap.JUSTIFY_RIGHT, ev)) {
						action = 'justifyright';
						doExec = true;
					}
					break;
			}
			if (doExec && action) {
				this.execCommand(action, null);
				Event.stopEvent(ev);
				this.nodeChange();
			}
		},		
		/**
		* @private
		* @method _renderCreateLinkWindow
		* @description Pre renders the CreateLink window so we get faster window opening.
		*/
		_renderCreateLinkWindow: function() {
			var str = '<label for="' + this.get('id') + '_createlink_url"><strong>' + this.STR_LINK_URL + ':</strong> <input type="text" name="' + this.get('id') + '_createlink_url" id="' + this.get('id') + '_createlink_url" value=""></label>';
			str += '<label for="' + this.get('id') + '_createlink_target"><strong>&nbsp;</strong><input type="checkbox" name="' + this.get('id') + '_createlink_target" id="' + this.get('id') + '_createlink_target" value="_blank" class="createlink_target"> ' + this.STR_LINK_NEW_WINDOW + '</label>';
			str += '<label for="' + this.get('id') + '_createlink_title"><strong>' + this.STR_LINK_TITLE + ':</strong> <input type="text" name="' + this.get('id') + '_createlink_title" id="' + this.get('id') + '_createlink_title" value=""></label>';
			
			var body = document.createElement('div');
			body.innerHTML = str;

			var unlinkCont = document.createElement('div');
			unlinkCont.className = 'removeLink';
			var unlink = document.createElement('a');
			unlink.href = '#';
			unlink.innerHTML = this.STR_LINK_PROP_REMOVE;
			unlink.title = this.STR_LINK_PROP_REMOVE;
			Event.on(unlink, 'click', function(ev) {
				Event.stopEvent(ev);
				this.unsubscribeAll('afterExecCommand');
				this.execCommand('unlink');
				this.closeWindow();
			}, this, true);
			unlinkCont.appendChild(unlink);
			body.appendChild(unlinkCont);
			
			this._windows.createlink = {};
			this._windows.createlink.body = body;
			//body.style.display = 'none';
			Event.on(body, 'keyup', function(e) {
				Event.stopPropagation(e);
			});
			this.get('panel').editor_form.appendChild(body);
			this.fireEvent('windowCreateLinkRender', { type: 'windowCreateLinkRender', panel: this.get('panel'), body: body });
			return body;
		},
		_handleCreateLinkClick: function() {
			var el = this._getSelectedElement();
			if (this._isElement(el, 'img')) {
				this.STOP_EXEC_COMMAND = true;
				this.currentElement[0] = el;
				this.toolbar.fireEvent('insertimageClick', { type: 'insertimageClick', target: this.toolbar });
				this.fireEvent('afterExecCommand', { type: 'afterExecCommand', target: this });
				return false;
			}
			if (this.get('limitCommands')) {
				if (!this.toolbar.getButtonByValue('createlink')) {
					return false;
				}
			}
			
			this.on('afterExecCommand', function() {
				var win = new YAHOO.widget.EditorWindow('createlink', {
					width: '350px'
				});
				
				var el = this.currentElement[0],
					url = '',
					title = '',
					target = '',
					localFile = false;
				if (el) {
					win.el = el;
					if (el.getAttribute('href', 2) !== null) {
						url = el.getAttribute('href', 2);
						if (this._isLocalFile(url)) {
							//Local File throw Warning
							win.setFooter(this.STR_LOCAL_FILE_WARNING);
							localFile = true;
						} else {
							win.setFooter(' ');
						}
					}
					if (el.getAttribute('title') !== null) {
						title = el.getAttribute('title');
					}
					if (el.getAttribute('target') !== null) {
						target = el.getAttribute('target');
					}
				}
				var body = null;
				if (this._windows.createlink && this._windows.createlink.body) {
					body = this._windows.createlink.body;
				} else {
					body = this._renderCreateLinkWindow();
				}

				win.setHeader(this.STR_LINK_PROP_TITLE);
				win.setBody(body);

				Event.purgeElement(this.get('id') + '_createlink_url');

				Dom.get(this.get('id') + '_createlink_url').value = url;
				Dom.get(this.get('id') + '_createlink_title').value = title;
				Dom.get(this.get('id') + '_createlink_target').checked = ((target) ? true : false);
				

				Event.onAvailable(this.get('id') + '_createlink_url', function() {
					var id = this.get('id');
					window.setTimeout(function() {
						try {
							YAHOO.util.Dom.get(id + '_createlink_url').focus();
						} catch (e) {}
					}, 50);

					if (this._isLocalFile(url)) {
						//Local File throw Warning
						Dom.addClass(this.get('id') + '_createlink_url', 'warning');
						this.get('panel').setFooter(this.STR_LOCAL_FILE_WARNING);
					} else {
						Dom.removeClass(this.get('id') + '_createlink_url', 'warning');
						this.get('panel').setFooter(' ');
					}
					Event.on(this.get('id') + '_createlink_url', 'blur', function() {
						var url = Dom.get(this.get('id') + '_createlink_url');
						if (this._isLocalFile(url.value)) {
							//Local File throw Warning
							Dom.addClass(url, 'warning');
							this.get('panel').setFooter(this.STR_LOCAL_FILE_WARNING);
						} else {
							Dom.removeClass(url, 'warning');
							this.get('panel').setFooter(' ');
						}
					}, this, true);
				}, this, true);
				
				this.openWindow(win);

			});
		},
		/**
		* @private
		* @method _handleCreateLinkWindowClose
		* @description Handles the closing of the Link Properties Window.
		*/
		_handleCreateLinkWindowClose: function() {
			var url = Dom.get(this.get('id') + '_createlink_url'),
				target = Dom.get(this.get('id') + '_createlink_target'),
				title = Dom.get(this.get('id') + '_createlink_title'),
				el = arguments[0].win.el,
				a = el;

			if (url && url.value) {
				var urlValue = url.value;
				if ((urlValue.indexOf(':/'+'/') == -1) && (urlValue.substring(0,1) != '/') && (urlValue.substring(0, 6).toLowerCase() != 'mailto')) {
					if ((urlValue.indexOf('@') != -1) && (urlValue.substring(0, 6).toLowerCase() != 'mailto')) {
						//Found an @ sign, prefix with mailto:
						urlValue = 'mailto:' + urlValue;
					} else {
						// :// not found adding
						if (urlValue.substring(0, 1) != '#') {
							urlValue = 'http:/'+'/' + urlValue;
						}
						
					}
				}
				el.setAttribute('href', urlValue);
				if (target.checked) {
					el.setAttribute('target', target.value);
				} else {
					el.setAttribute('target', '');
				}
				el.setAttribute('title', ((title.value) ? title.value : ''));

			} else {
				var _span = this._getDoc().createElement('span');
				_span.innerHTML = el.innerHTML;
				Dom.addClass(_span, 'yui-non');
				el.parentNode.replaceChild(_span, el);
			}
			Dom.removeClass(url, 'warning');
			Dom.get(this.get('id') + '_createlink_url').value = '';
			Dom.get(this.get('id') + '_createlink_title').value = '';
			Dom.get(this.get('id') + '_createlink_target').checked = false;
			this.nodeChange();
			this.currentElement = [];
			
		},
		/**
		* @private
		* @method _renderInsertImageWindow
		* @description Pre renders the InsertImage window so we get faster window opening.
		*/
		_renderInsertImageWindow: function() {
			var el = this.currentElement[0];
			var str = '<label for="' + this.get('id') + '_insertimage_url"><strong>' + this.STR_IMAGE_URL + ':</strong> <input type="text" id="' + this.get('id') + '_insertimage_url" value="" size="40"></label>';
			var body = document.createElement('div');
			body.innerHTML = str;

			var hw = document.createElement('div');
			hw.className = 'yui-toolbar-group yui-toolbar-group-height-width height-width';
			hw.innerHTML = '<h3>' + this.STR_IMAGE_SIZE + ':</h3>';
			hw.innerHTML += '<span tabIndex="-1"><input type="text" size="3" value="" id="' + this.get('id') + '_insertimage_width"> x <input type="text" size="3" value="" id="' + this.get('id') + '_insertimage_height"></span>';
			body.appendChild(hw);

			var str2 = '<label for="' + this.get('id') + '_insertimage_title"><strong>' + this.STR_IMAGE_TITLE + ':</strong> <input type="text" id="' + this.get('id') + '_insertimage_title" value="" size="40"></label>';
			str2 += '<label for="' + this.get('id') + '_insertimage_link"><strong>' + this.STR_LINK_URL + ':</strong> <input type="text" name="' + this.get('id') + '_insertimage_link" id="' + this.get('id') + '_insertimage_link" value=""></label>';
			str2 += '<label for="' + this.get('id') + '_insertimage_target"><strong>&nbsp;</strong><input type="checkbox" name="' + this.get('id') + '_insertimage_target_" id="' + this.get('id') + '_insertimage_target" value="_blank" class="insertimage_target"> ' + this.STR_LINK_NEW_WINDOW + '</label>';
			var div = document.createElement('div');
			div.innerHTML = str2;
			body.appendChild(div);

			if (this.get('localFileWarning')) {
				Event.on(this.get('id') + '_insertimage_link', 'blur', function() {
					var url = Dom.get(this.get('id') + '_insertimage_link');
					if (this._isLocalFile(url.value)) {
						//Local File throw Warning
						Dom.addClass(url, 'warning');
						this.get('panel').setFooter(this.STR_LOCAL_FILE_WARNING);
					} else {
						Dom.removeClass(url, 'warning');
						this.get('panel').setFooter(' ');
						//Adobe AIR Code
						if ((this.browser.webkit && !this.browser.webkit3 || this.browser.air) || this.browser.opera) {				
							this.get('panel').setFooter(this.STR_IMAGE_COPY);
						}
					}
				}, this, true);
			}

			Event.on(this.get('id') + '_insertimage_url', 'blur', function() {
				var url = Dom.get(this.get('id') + '_insertimage_url');
				if (url.value && el) {
					if (url.value == el.getAttribute('src', 2)) {
						return false;
					}
				}
				if (this._isLocalFile(url.value)) {
					//Local File throw Warning
					Dom.addClass(url, 'warning');
					this.get('panel').setFooter(this.STR_LOCAL_FILE_WARNING);
				} else if (this.currentElement[0]) {
					Dom.removeClass(url, 'warning');
					this.get('panel').setFooter(' ');
					//Adobe AIR Code
					if ((this.browser.webkit && !this.browser.webkit3 || this.browser.air) || this.browser.opera) {				
						this.get('panel').setFooter(this.STR_IMAGE_COPY);
					}
					
					if (url && url.value && (url.value != this.STR_IMAGE_HERE)) {
						this.currentElement[0].setAttribute('src', url.value);
						var self = this,
							img = new Image();

						img.onerror = function() {
							url.value = self.STR_IMAGE_HERE;
							img.setAttribute('src', self.get('blankimage'));
							self.currentElement[0].setAttribute('src', self.get('blankimage'));
							YAHOO.util.Dom.get(self.get('id') + '_insertimage_height').value = img.height;
							YAHOO.util.Dom.get(self.get('id') + '_insertimage_width').value = img.width;
						};
						var id = this.get('id');
						var ce = this.currentElement[0];
						window.setTimeout(function() {
							YAHOO.util.Dom.get(id + '_insertimage_height').value = img.height;
							YAHOO.util.Dom.get(id + '_insertimage_width').value = img.width;
							if (ce) {
								ce.setAttribute('width', ce.width);
								ce.setAttribute('height', ce.height);
							}
							if (self.currentElement && self.currentElement[0]) {
								if (!self.currentElement[0]._height) {
									self.currentElement[0]._height = img.height;
								}
								if (!self.currentElement[0]._width) {
									self.currentElement[0]._width = img.width;
								}
							}
							//Removed moveWindow call so the window doesn't jump
							//self.moveWindow();
						}, 800); //Bumped the timeout up to account for larger images..

						if (url.value != this.STR_IMAGE_HERE) {
							img.src = url.value;
						}
					}
				}
			}, this, true);
			
			this._windows.insertimage = {};
			this._windows.insertimage.body = body;
			//body.style.display = 'none';
			this.get('panel').editor_form.appendChild(body);
			this.fireEvent('windowInsertImageRender', { type: 'windowInsertImageRender', panel: this.get('panel'), body: body });
			return body;
		},
		/**
		* @private
		* @method _handleInsertImageClick
		* @description Opens the Image Properties Window when the insert Image button is clicked or an Image is Double Clicked.
		*/
		_handleInsertImageClick: function() {
			if (this.get('limitCommands')) {
				if (!this.toolbar.getButtonByValue('insertimage')) {
					return false;
				}
			}
			this.on('afterExecCommand', function() {
				var el = this.currentElement[0],
					body = null,
					link = '',
					target = '',
					title = '',
					src = '',
					align = '',
					height = 75,
					width = 75,
					oheight = 0,
					owidth = 0,
					blankimage = false,
					win = new YAHOO.widget.EditorWindow('insertimage', {
						width: '415px'
					});

				if (!el) {
					el = this._getSelectedElement();
				}
				if (el) {
					win.el = el;
					if (el.getAttribute('src')) {
						src = el.getAttribute('src', 2);
						if (src.indexOf(this.get('blankimage')) != -1) {
							src = this.STR_IMAGE_HERE;
							blankimage = true;
						}
					}
					if (el.getAttribute('alt', 2)) {
						title = el.getAttribute('alt', 2);
					}
					if (el.getAttribute('title', 2)) {
						title = el.getAttribute('title', 2);
					}

					if (el.parentNode && this._isElement(el.parentNode, 'a')) {
						link = el.parentNode.getAttribute('href', 2);
						if (el.parentNode.getAttribute('target') !== null) {
							target = el.parentNode.getAttribute('target');
						}
					}
					height = parseInt(el.height, 10);
					width = parseInt(el.width, 10);
					if (el.style.height) {
						height = parseInt(el.style.height, 10);
					}
					if (el.style.width) {
						width = parseInt(el.style.width, 10);
					}
					if (!el._height) {
						el._height = height;
					}
					if (!el._width) {
						el._width = width;
					}
					oheight = el._height;
					owidth = el._width;
				}
				if (this._windows.insertimage && this._windows.insertimage.body) {
					body = this._windows.insertimage.body;
				} else {
					body = this._renderInsertImageWindow();
				}

				win.setHeader(this.STR_IMAGE_PROP_TITLE);
				win.setBody(body);
				//Adobe AIR Code
				if ((this.browser.webkit && !this.browser.webkit3 || this.browser.air) || this.browser.opera) {				
					win.setFooter(this.STR_IMAGE_COPY);
				}
				this.openWindow(win);
				Dom.get(this.get('id') + '_insertimage_url').value = src;
				Dom.get(this.get('id') + '_insertimage_title').value = title;
				Dom.get(this.get('id') + '_insertimage_link').value = link;
				Dom.get(this.get('id') + '_insertimage_target').checked = ((target) ? true : false);
				Dom.get(this.get('id') + '_insertimage_width').value = width;
				Dom.get(this.get('id') + '_insertimage_height').value = height;

				var orgSize = '';
				if ((height != oheight) || (width != owidth)) {
					var s = document.createElement('span');
					s.className = 'info';
					s.innerHTML = this.STR_IMAGE_ORIG_SIZE + ': ('+ owidth +' x ' + oheight + ')';
					if (Dom.get(this.get('id') + '_insertimage_height').nextSibling) {
						var old = Dom.get(this.get('id') + '_insertimage_height').nextSibling;
						old.parentNode.removeChild(old);
					}
					Dom.get(this.get('id') + '_insertimage_height').parentNode.appendChild(s);
				}

				this.toolbar.selectButton('insertimage');
				var id = this.get('id');
				window.setTimeout(function() {
					try {
						YAHOO.util.Dom.get(id + '_insertimage_url').focus();
						if (blankimage) {
							YAHOO.util.Dom.get(id + '_insertimage_url').select();
						}
					} catch (e) {}
				}, 50);

			});
		},
		/**
		* @private
		* @method _handleInsertImageWindowClose
		* @description Handles the closing of the Image Properties Window.
		*/
		_handleInsertImageWindowClose: function() {
			var url = Dom.get(this.get('id') + '_insertimage_url'),
				title = Dom.get(this.get('id') + '_insertimage_title'),
				link = Dom.get(this.get('id') + '_insertimage_link'),
				target = Dom.get(this.get('id') + '_insertimage_target'),
				el = arguments[0].win.el;

			if (url && url.value && (url.value != this.STR_IMAGE_HERE)) {
				el.setAttribute('src', url.value);
				el.setAttribute('title', title.value);
				el.setAttribute('alt', title.value);
				var par = el.parentNode;
				if (link.value) {
					var urlValue = link.value;
					if ((urlValue.indexOf(':/'+'/') == -1) && (urlValue.substring(0,1) != '/') && (urlValue.substring(0, 6).toLowerCase() != 'mailto')) {
						if ((urlValue.indexOf('@') != -1) && (urlValue.substring(0, 6).toLowerCase() != 'mailto')) {
							//Found an @ sign, prefix with mailto:
							urlValue = 'mailto:' + urlValue;
						} else {
							// :// not found adding
							urlValue = 'http:/'+'/' + urlValue;
						}
					}
					if (par && this._isElement(par, 'a')) {
						par.setAttribute('href', urlValue);
						if (target.checked) {
							par.setAttribute('target', target.value);
						} else {
							par.setAttribute('target', '');
						}
					} else {
						var _a = this._getDoc().createElement('a');
						_a.setAttribute('href', urlValue);
						if (target.checked) {
							_a.setAttribute('target', target.value);
						} else {
							_a.setAttribute('target', '');
						}
						el.parentNode.replaceChild(_a, el);
						_a.appendChild(el);
					}
				} else {
					if (par && this._isElement(par, 'a')) {
						par.parentNode.replaceChild(el, par);
					}
				}
			} else {
				//No url/src given, remove the node from the document
				el.parentNode.removeChild(el);
			}
			Dom.get(this.get('id') + '_insertimage_url').value = '';
			Dom.get(this.get('id') + '_insertimage_title').value = '';
			Dom.get(this.get('id') + '_insertimage_link').value = '';
			Dom.get(this.get('id') + '_insertimage_target').checked = false;
			Dom.get(this.get('id') + '_insertimage_width').value = 0;
			Dom.get(this.get('id') + '_insertimage_height').value = 0;
			this.currentElement = [];
			this.nodeChange();
		},
		/**
		* @property EDITOR_PANEL_ID
		* @description HTML id to give the properties window in the DOM.
		* @type String
		*/
		EDITOR_PANEL_ID: '-panel',
		/**
		* @private
		* @method _renderPanel
		* @description Renders the panel used for Editor Windows to the document so we can start using it..
		* @return {<a href="YAHOO.widget.Overlay.html">YAHOO.widget.Overlay</a>}
		*/
		_renderPanel: function() {
			var panelEl = document.createElement('div');
			Dom.addClass(panelEl, 'yui-editor-panel');
			panelEl.id = this.get('id') + this.EDITOR_PANEL_ID;
			panelEl.style.position = 'absolute';
			panelEl.style.top = '-9999px';
			panelEl.style.left = '-9999px';
			document.body.appendChild(panelEl);
			this.get('element_cont').insertBefore(panelEl, this.get('element_cont').get('firstChild'));

			var panel = new YAHOO.widget.Overlay(this.get('id') + this.EDITOR_PANEL_ID, {
					width: '300px',
					iframe: true,
					visible: false,
					underlay: 'none',
					draggable: false,
					close: false
				});
			this.set('panel', panel);

			panel.setBody('---');
			panel.setHeader(' ');
			panel.setFooter(' ');


			var body = document.createElement('div');
			body.className = this.CLASS_PREFIX + '-body-cont';
			for (var b in this.browser) {
				if (this.browser[b]) {
					Dom.addClass(body, b);
					break;
				}
			}
			Dom.addClass(body, ((YAHOO.widget.Button && (this._defaultToolbar.buttonType == 'advanced')) ? 'good-button' : 'no-button'));

			var _note = document.createElement('h3');
			_note.className = 'yui-editor-skipheader';
			_note.innerHTML = this.STR_CLOSE_WINDOW_NOTE;
			body.appendChild(_note);
			var form = document.createElement('fieldset');
			panel.editor_form = form;

			body.appendChild(form);
			var _close = document.createElement('span');
			_close.innerHTML = 'X';
			_close.title = this.STR_CLOSE_WINDOW;
			_close.className = 'close';
			
			Event.on(_close, 'click', this.closeWindow, this, true);

			var _knob = document.createElement('span');
			_knob.innerHTML = '^';
			_knob.className = 'knob';
			panel.editor_knob = _knob;

			var _header = document.createElement('h3');
			panel.editor_header = _header;
			_header.innerHTML = '<span></span>';

			panel.setHeader(' '); //Clear the current header
			panel.appendToHeader(_header);
			_header.appendChild(_close);
			_header.appendChild(_knob);
			panel.setBody(' '); //Clear the current body
			panel.setFooter(' '); //Clear the current footer
			panel.appendToBody(body); //Append the new DOM node to it

			Event.on(panel.element, 'click', function(ev) {
				Event.stopPropagation(ev);
			});

			var fireShowEvent = function() {
				panel.bringToTop();
				YAHOO.util.Dom.setStyle(this.element, 'display', 'block');
				this._handleWindowInputs(false);
			};
			panel.showEvent.subscribe(fireShowEvent, this, true);
			panel.hideEvent.subscribe(function() {
				this._handleWindowInputs(true);
			}, this, true);
			panel.renderEvent.subscribe(function() {
				this._renderInsertImageWindow();
				this._renderCreateLinkWindow();
				this.fireEvent('windowRender', { type: 'windowRender', panel: panel });
				this._handleWindowInputs(true);
			}, this, true);

			if (this.DOMReady) {
				this.get('panel').render();
			} else {
				Event.onDOMReady(function() {
					this.get('panel').render();
				}, this, true);
			}
			return this.get('panel');
		},
		/**
		* @method _handleWindowInputs
		* @param {Boolean} disable The state to set all inputs in all Editor windows to. Defaults to: false.
		* @description Disables/Enables all fields inside Editor windows. Used in show/hide events to keep window fields from submitting when the parent form is submitted.
		*/
		_handleWindowInputs: function(disable) {
			if (!Lang.isBoolean(disable)) {
				disable = false;
			}
			var inputs = this.get('panel').element.getElementsByTagName('input');
			for (var i = 0; i < inputs.length; i++) {
				try {
					inputs[i].disabled = disable;
				} catch (e) {}
			}
		},
		/**
		* @method openWindow
		* @param {<a href="YAHOO.widget.EditorWindow.html">YAHOO.widget.EditorWindow</a>} win A <a href="YAHOO.widget.EditorWindow.html">YAHOO.widget.EditorWindow</a> instance
		* @description Opens a new "window/panel"
		*/
		openWindow: function(win) {
			var self = this;
			window.setTimeout(function() {
				self.toolbar.set('disabled', true); //Disable the toolbar when an editor window is open..
			}, 10);
			Event.on(document, 'keydown', this._closeWindow, this, true);
			
			if (this.currentWindow) {
				this.closeWindow();
			}
			
			var xy = Dom.getXY(this.currentElement[0]),
			elXY = Dom.getXY(this.get('iframe').get('element')),
			panel = this.get('panel'),
			newXY = [(xy[0] + elXY[0] - 20), (xy[1] + elXY[1] + 10)],
			wWidth = (parseInt(win.attrs.width, 10) / 2),
			align = 'center',
			body = null;

			this.fireEvent('beforeOpenWindow', { type: 'beforeOpenWindow', win: win, panel: panel });

			var form = panel.editor_form;
			
			var wins = this._windows;
			for (var b in wins) {
				if (Lang.hasOwnProperty(wins, b)) {
					if (wins[b] && wins[b].body) {
						if (b == win.name) {
							Dom.setStyle(wins[b].body, 'display', 'block');
						} else {
							Dom.setStyle(wins[b].body, 'display', 'none');
						}
					}
				}
			}
			
			if (this._windows[win.name].body) {
				Dom.setStyle(this._windows[win.name].body, 'display', 'block');
				form.appendChild(this._windows[win.name].body);
			} else {
				if (Lang.isObject(win.body)) { //Assume it's a reference
					form.appendChild(win.body);
				} else { //Assume it's a string
					var _tmp = document.createElement('div');
					_tmp.innerHTML = win.body;
					form.appendChild(_tmp);
				}
			}
			panel.editor_header.firstChild.innerHTML = win.header;
			if (win.footer !== null) {
				panel.setFooter(win.footer);
				Dom.addClass(panel.footer, 'open');
			} else {
				Dom.removeClass(panel.footer, 'open');
			}
			panel.cfg.setProperty('width', win.attrs.width);

			this.currentWindow = win;
			this.moveWindow(true);
			panel.show();
			this.fireEvent('afterOpenWindow', { type: 'afterOpenWindow', win: win, panel: panel });
		},
		/**
		* @method moveWindow
		* @param {Boolean} force Boolean to tell it to move but not use any animation (Usually done the first time the window is loaded.)
		* @description Realign the window with the currentElement and reposition the knob above the panel.
		*/
		moveWindow: function(force) {
			if (!this.currentWindow) {
				return false;
			}
			var win = this.currentWindow,
				xy = Dom.getXY(this.currentElement[0]),
				elXY = Dom.getXY(this.get('iframe').get('element')),
				panel = this.get('panel'),
				//newXY = [(xy[0] + elXY[0] - 20), (xy[1] + elXY[1] + 10)],
				newXY = [(xy[0] + elXY[0]), (xy[1] + elXY[1])],
				wWidth = (parseInt(win.attrs.width, 10) / 2),
				align = 'center',
				orgXY = panel.cfg.getProperty('xy') || [0,0],
				_knob = panel.editor_knob,
				xDiff = 0,
				yDiff = 0,
				anim = false;


			newXY[0] = ((newXY[0] - wWidth) + 20);
			//Account for the Scroll bars in a scrolled editor window.
			newXY[0] = newXY[0] - Dom.getDocumentScrollLeft(this._getDoc());
			newXY[1] = newXY[1] - Dom.getDocumentScrollTop(this._getDoc());
			
			if (this._isElement(this.currentElement[0], 'img')) {
				if (this.currentElement[0].src.indexOf(this.get('blankimage')) != -1) {
					newXY[0] = (newXY[0] + (75 / 2)); //Placeholder size
					newXY[1] = (newXY[1] + 75); //Placeholder sizea
				} else {
					var w = parseInt(this.currentElement[0].width, 10);
					var h = parseInt(this.currentElement[0].height, 10);
					newXY[0] = (newXY[0] + (w / 2));
					newXY[1] = (newXY[1] + h);
				}
				newXY[1] = newXY[1] + 15;
			} else {
				var fs = Dom.getStyle(this.currentElement[0], 'fontSize');
				if (fs && fs.indexOf && fs.indexOf('px') != -1) {
					newXY[1] = newXY[1] + parseInt(Dom.getStyle(this.currentElement[0], 'fontSize'), 10) + 5;
				} else {
					newXY[1] = newXY[1] + 20;
				}
			}
			if (newXY[0] < elXY[0]) {
				newXY[0] = elXY[0] + 5;
				align = 'left';
			}

			if ((newXY[0] + (wWidth * 2)) > (elXY[0] + parseInt(this.get('iframe').get('element').clientWidth, 10))) {
				newXY[0] = ((elXY[0] + parseInt(this.get('iframe').get('element').clientWidth, 10)) - (wWidth * 2) - 5);
				align = 'right';
			}
			
			try {
				xDiff = (newXY[0] - orgXY[0]);
				yDiff = (newXY[1] - orgXY[1]);
			} catch (e) {}


			var iTop = elXY[1] + parseInt(this.get('height'), 10);
			var iLeft = elXY[0] + parseInt(this.get('width'), 10);
			if (newXY[1] > iTop) {
				newXY[1] = iTop;
			}
			if (newXY[0] > iLeft) {
				newXY[0] = (iLeft / 2);
			}
			
			//Convert negative numbers to positive so we can get the difference in distance
			xDiff = ((xDiff < 0) ? (xDiff * -1) : xDiff);
			yDiff = ((yDiff < 0) ? (yDiff * -1) : yDiff);

			if (((xDiff > 10) || (yDiff > 10)) || force) { //Only move the window if it's supposed to move more than 10px or force was passed (new window)
				var _knobLeft = 0,
					elW = 0;

				if (this.currentElement[0].width) {
					elW = (parseInt(this.currentElement[0].width, 10) / 2);
				}

				var leftOffset = xy[0] + elXY[0] + elW;
				_knobLeft = leftOffset - newXY[0];
				//Check to see if the knob will go off either side & reposition it
				if (_knobLeft > (parseInt(win.attrs.width, 10) - 1)) {
					_knobLeft = ((parseInt(win.attrs.width, 10) - 30) - 1);
				} else if (_knobLeft < 40) {
					_knobLeft = 1;
				}
				if (isNaN(_knobLeft)) {
					_knobLeft = 1;
				}
				if (force) {
					if (_knob) {
						_knob.style.left = _knobLeft + 'px';
					}
					//Removed Animation from a forced move..
					panel.cfg.setProperty('xy', newXY);
				} else {
					if (this.get('animate')) {
						anim = new YAHOO.util.Anim(panel.element, {}, 0.5, YAHOO.util.Easing.easeOut);
						anim.attributes = {
							top: {
								to: newXY[1]
							},
							left: {
								to: newXY[0]
							}
						};
						anim.onComplete.subscribe(function() {
							panel.cfg.setProperty('xy', newXY);
						});
						//We have to animate the iframe shim at the same time as the panel or we get scrollbar bleed ..
						var iframeAnim = new YAHOO.util.Anim(panel.iframe, anim.attributes, 0.5, YAHOO.util.Easing.easeOut);

						var _knobAnim = new YAHOO.util.Anim(_knob, {
							left: {
								to: _knobLeft
							}
						}, 0.6, YAHOO.util.Easing.easeOut);
						anim.animate();
						iframeAnim.animate();
						_knobAnim.animate();
					} else {
						_knob.style.left = _knobLeft + 'px';
						panel.cfg.setProperty('xy', newXY);
					}
				}
			}
		},
		/**
		* @private
		* @method _closeWindow
		* @description Close the currently open EditorWindow with the Escape key.
		* @param {Event} ev The keypress Event that we are trapping
		*/
		_closeWindow: function(ev) {
			//if ((ev.charCode == 87) && ev.shiftKey && ev.ctrlKey) {
			if (this._checkKey(this._keyMap.CLOSE_WINDOW, ev)) {			
				if (this.currentWindow) {
					this.closeWindow();
				}
			}
		},
		/**
		* @method closeWindow
		* @description Close the currently open EditorWindow.
		*/
		closeWindow: function(keepOpen) {
			this.fireEvent('window' + this.currentWindow.name + 'Close', { type: 'window' + this.currentWindow.name + 'Close', win: this.currentWindow, el: this.currentElement[0] });
			this.fireEvent('closeWindow', { type: 'closeWindow', win: this.currentWindow });
			this.currentWindow = null;
			this.get('panel').hide();
			this.get('panel').cfg.setProperty('xy', [-900,-900]);
			this.get('panel').syncIframe(); //Needed to move the iframe with the hidden panel
			this.unsubscribeAll('afterExecCommand');
			this.toolbar.set('disabled', false); //enable the toolbar now that the window is closed
			this.toolbar.resetAllButtons();
			this.focus();
			Event.removeListener(document, 'keydown', this._closeWindow);
		},

		/* {{{  Command Overrides - These commands are only over written when we are using the advanced version */
		
		/**
		* @method cmd_undo
		* @description Pulls an item from the Undo stack and updates the Editor
		* @param value Value passed from the execCommand method
		*/
		cmd_undo: function(value) {
			if (this._hasUndoLevel()) {
				if (!this._undoLevel) {
					this._undoLevel = this._undoCache.length;
				}
				this._undoLevel = (this._undoLevel - 1);
				if (this._undoCache[this._undoLevel]) {
					var html = this._getUndo(this._undoLevel);
					this.setEditorHTML(html);
				} else {
					this._undoLevel = null;
					this.toolbar.disableButton('undo');
				}
			}
			return [false];
		},

		/**
		* @method cmd_redo
		* @description Pulls an item from the Undo stack and updates the Editor
		* @param value Value passed from the execCommand method
		*/
		cmd_redo: function(value) {
			this._undoLevel = this._undoLevel + 1;
			if (this._undoLevel >= this._undoCache.length) {
				this._undoLevel = this._undoCache.length;
			}
			if (this._undoCache[this._undoLevel]) {
				var html = this._getUndo(this._undoLevel);
				this.setEditorHTML(html);
			} else {
				this.toolbar.disableButton('redo');
			}
			return [false];
		},	   
		/**
		* @method cmd_removeformat
		* @param value Value passed from the execCommand method
		* @description This is an execCommand override method. It is called from execCommand when the execCommand('removeformat') is used.
		*/
		cmd_removeformat: function(value) {
			var exec = true;
			/*
			* @knownissue Remove Format issue
			* @browser Safari 2.x
			* @description There is an issue here with Safari, that it may not always remove the format of the item that is selected.
			* Due to the way that Safari 2.x handles ranges, it is very difficult to determine what the selection holds.
			* So here we are making the best possible guess and acting on it.
			*/
			if (this.browser.webkit && !this._getDoc().queryCommandEnabled('removeformat')) {
				var _txt = this._getSelection()+'';
				this._createCurrentElement('span');
				this.currentElement[0].className = 'yui-non';
				this.currentElement[0].innerHTML = _txt;
				for (var i = 1; i < this.currentElement.length; i++) {
					this.currentElement[i].parentNode.removeChild(this.currentElement[i]);
				}
				
				exec = false;
			}
			return [exec];
		},
		/**
		* @method cmd_justify
		* @param dir The direction to justify
		* @description This is a factory method for the justify family of commands.
		*/
		cmd_justify: function(dir) {
			if (this.browser.gecko) {
				this._getDoc().execCommand('insertparagraph', null, '');
				var el = this._getSelectedElement();
				if (this._isElement(el, 'p')) {
					el.align = dir;
				}
			} else if (this.browser.ie) {
				var range = this._getRange();
				range.pasteHTML('<p align="' + dir + '">' + range.htmlText + '</p>');
			} else if (this.browser.opera) {
				var range = this._getRange();
				var p = document.createElement("p");
				p.align = dir;
				range.surroundContents(p);
			} else {
				// Need a workaround for Safari
			}
			return false;
		},
		/**
		* @method cmd_justifycenter
		* @param value Value passed from the execCommand method
		* @description This is an execCommand override method. It is called from execCommand when the execCommand('justifycenter') is used.
		*/
		cmd_justifycenter: function() {
			return this.cmd_justify('center');
		},
		/**
		* @method cmd_justifyleft
		* @param value Value passed from the execCommand method
		* @description This is an execCommand override method. It is called from execCommand when the execCommand('justifyleft') is used.
		*/
		cmd_justifyleft: function() {
			return this.cmd_justify('left');
		},
		/**
		* @method cmd_justifyright
		* @param value Value passed from the execCommand method
		* @description This is an execCommand override method. It is called from execCommand when the execCommand('justifyright') is used.
		*/
		cmd_justifyright: function() {
			return this.cmd_justify('right');
		},
		/* }}}*/		
		/**
		* @method cmd_underline
		* @param value Value passed from the execCommand method
		* @description This is an execCommand override method. It is called from execCommand when the execCommand('underline') is used.
		*/
		cmd_underline: function(value) {
			if (!this.browser.webkit) {
				var el = this._getSelectedElement();
				if (el && this._isElement(el, 'span') && this._hasSelection()) {
					if (el.style.textDecoration == 'underline') {
						el.style.textDecoration = '';
						var u = this._getDoc().createElement('u'),
						par = el.parentNode;
						par.replaceChild(u, el);
						u.appendChild(el);
						this._selectNode(u);
					}
				}
			}
			return [true];
		},
		/**
		* @method cmd_fontsize
		* @param value Value passed from the execCommand method
		* @description This is an execCommand override method. It is called from execCommand when the execCommand('fontsize') is used.
		*/
		cmd_fontsize: function(value) {
			var el = this._getSelectedElement();
			var val = parseInt(value);
			val = (val > 0) ? '+' + val : val;
			if (this._hasSelection()) {
				if (!el || this._isElement(el, 'body')) {
					this._createCurrentElement('span');
					var font = this._swapEl(this.currentElement[0], 'font', function(elt) {
						elt.setAttribute('size', val ? val : '');
					});
				} else if (this._isElement(el, 'font')) {
					el.setAttribute('size', val ? val : '');
					var font = el;
				} else {
					var font = this._getDoc().createElement('font'),
					par = font.parentNode;
					par.replaceChild(font, el);
					font.appendChild(el);
					font.setAttribute('size', val ? val : '');
				}
				this._selectNode(font);
			}
			return false;
		},
		/**
		* @method cmd_forecolor
		* @param value Value passed from the execCommand method
		* @description This is an execCommand override method. It is called from execCommand when the execCommand('forecolor') is used.
		*/
		cmd_forecolor: function(value) {
			var el = this._getSelectedElement();
			if (this._hasSelection()) {
				if (!el || this._isElement(el, 'body')) {
					this._createCurrentElement('span');
					var font = this._swapEl(this.currentElement[0], 'font', function(elt) {
						elt.setAttribute('color', value);
					});
					this._selectNode(this.currentElement[0]);
				} else if (this._isElement(el, 'font')) {
					el.setAttribute('color', value);
					var font = el;
				} else {
					var font = this._getDoc().createElement('font'),
					par = font.parentNode;
					par.replaceChild(font, el);
					font.appendChild(el);
					font.setAttribute('color', value);
				}
				this._selectNode(font);
			}
			return false;
		},
		/**
		* @private
		* @property _editHtmlEnabled
		* @description The state of HTML editor.
		* @type boolean
		*/
		_editHtmlEnabled: false,
		/**
		* @method cmd_editcode
		* @description This is an execCommand override method. It is called from execCommand when the execCommand('editcode') is used.
		*/
		cmd_editcode: function() {
			var ta = this.get('element'),
			iframe = this.get('iframe').get('element');

			if (this._editHtmlEnabled) {
				this._editHtmlEnabled = false;
				this.toolbar.set('disabled', false);
				this.setEditorHTML(ta.value);
				if (!this.browser.ie) {
					this._setDesignMode('on');
				}
				Dom.removeClass(iframe, 'editor-hidden');
				Dom.addClass(ta, 'editor-hidden');
				this.show();
				this._focusWindow();
			} else {
				this._editHtmlEnabled = true;
				this.cleanHTML();
				Dom.addClass(iframe, 'editor-hidden');
				Dom.removeClass(ta, 'editor-hidden');
				this.toolbar.set('disabled', true);
				this.toolbar.getButtonByValue('editcode').set('disabled', false);
				this.toolbar.selectButton('editcode');
				this.dompath.innerHTML = 'Editing HTML Code';
				this.hide();
			}
			return false;
		},
		/**
		* @method cmd_insertcontactform
		* @description This is an execCommand override method. It is called from execCommand when the execCommand('insertcontactform') is used.
		*/
		cmd_insertcontactform: function() {
			if (this.browser.ie) {
				this._getDoc().selection.createRange().pasteHTML('<br /><img src="contactform" /><br />');
				return [false];
			} else {
				return [true, 'insertHTML', '<br /><img src="contactform" /><br />'];
			}
		},
		/**
		* @method toString
		* @description Returns a string representing the editor.
		* @return {String}
		*/
		toString: function() {
			var str = 'Editor';
			if (this.get && this.get('element_cont')) {
				str = 'Editor (#' + this.get('element_cont').get('id') + ')' + ((this.get('disabled') ? ' Disabled' : ''));
			}
			return str;
		},
		/**
		* @method cleanHtmlForIE
		* @description Encloses html attributes with double quotes
		* @return {String}
		*/
		cleanHtmlForIE: function(html) {
            html = html.replace(/(<[^\>]*?)size\=\"?\d"?/gi, '$1');
            html = html.replace(/\<font\s*?\>(.*?)\<\/font\s*?\>/gi, '$1');
			if (this.browser.ie) {
	            html = html.replace(/(<[^\>]*?color\=)([^\s\/\>\"]+)/gi, '$1"$2"');
	            html = html.replace(/(<[^\>]*?size\=)([^\s\/\>\"]+)/gi, '$1"$2"');
	            html = html.replace(/(<[^\>]*?width\=)([^\s\/\>\"]+)/gi, '$1"$2"');
	            html = html.replace(/(<[^\>]*?height\=)([^\s\/\>\"]+)/gi, '$1"$2"');
	            html = html.replace(/(<[^\>]*?hspace\=)([^\s\/\>\"]+)/gi, '$1"$2"');
	            html = html.replace(/(<[^\>]*?vspace\=)([^\s\/\>\"]+)/gi, '$1"$2"');
	            html = html.replace(/(<[^\>]*?alt\=)([^\s\/\>\"]+)/gi, '$1"$2"');
	            html = html.replace(/(<[^\>]*?target\=)([^\s\/\>\"]+)/gi, '$1"$2"');
			}
			return html;
		}
	});
/**
* @event beforeOpenWindow
* @param {<a href="YAHOO.widget.EditorWindow.html">EditorWindow</a>} win The EditorWindow object
* @param {Overlay} panel The Overlay object that is used to create the window.
* @description Event fires before an Editor Window is opened. See <a href="YAHOO.util.Element.html#addListener">Element.addListener</a> for more information on listening for this event.
* @type YAHOO.util.CustomEvent
*/
/**
* @event afterOpenWindow
* @param {<a href="YAHOO.widget.EditorWindow.html">EditorWindow</a>} win The EditorWindow object
* @param {Overlay} panel The Overlay object that is used to create the window.
* @description Event fires after an Editor Window is opened. See <a href="YAHOO.util.Element.html#addListener">Element.addListener</a> for more information on listening for this event.
* @type YAHOO.util.CustomEvent
*/
/**
* @event closeWindow
* @param {<a href="YAHOO.widget.EditorWindow.html">EditorWindow</a>} win The EditorWindow object
* @description Event fires after an Editor Window is closed. See <a href="YAHOO.util.Element.html#addListener">Element.addListener</a> for more information on listening for this event.
* @type YAHOO.util.CustomEvent
*/
/**
* @event windowCMDOpen
* @param {<a href="YAHOO.widget.EditorWindow.html">EditorWindow</a>} win The EditorWindow object
* @param {Overlay} panel The Overlay object that is used to create the window.
* @description Dynamic event fired when an <a href="YAHOO.widget.EditorWindow.html">EditorWindow</a> is opened.. The dynamic event is based on the name of the window. Example Window: createlink, opening this window would fire the windowcreatelinkOpen event. See <a href="YAHOO.util.Element.html#addListener">Element.addListener</a> for more information on listening for this event.
* @type YAHOO.util.CustomEvent
*/
/**
* @event windowCMDClose
* @param {<a href="YAHOO.widget.EditorWindow.html">EditorWindow</a>} win The EditorWindow object
* @param {Overlay} panel The Overlay object that is used to create the window.
* @description Dynamic event fired when an <a href="YAHOO.widget.EditorWindow.html">EditorWindow</a> is closed.. The dynamic event is based on the name of the window. Example Window: createlink, opening this window would fire the windowcreatelinkClose event. See <a href="YAHOO.util.Element.html#addListener">Element.addListener</a> for more information on listening for this event.
* @type YAHOO.util.CustomEvent
*/
/**
* @event windowRender
* @param {<a href="YAHOO.widget.EditorWindow.html">EditorWindow</a>} win The EditorWindow object
* @param {Overlay} panel The Overlay object that is used to create the window.
* @description Event fired when the initial Overlay is rendered. Can be used to manipulate the content of the panel.
* @type YAHOO.util.CustomEvent
*/
/**
* @event windowInsertImageRender
* @param {Overlay} panel The Overlay object that is used to create the window.
* @param {HTMLElement} body The HTML element used as the body of the window..
* @param {Toolbar} toolbar A reference to the toolbar object used inside this window.
* @description Event fired when the pre render of the Insert Image window has finished.
* @type YAHOO.util.CustomEvent
*/
/**
* @event windowCreateLinkRender
* @param {Overlay} panel The Overlay object that is used to create the window.
* @param {HTMLElement} body The HTML element used as the body of the window..
* @description Event fired when the pre render of the Create Link window has finished.
* @type YAHOO.util.CustomEvent
*/

	/**
	 * @description Class to hold Window information between uses. We use the same panel to show the windows, so using this will allow you to configure a window before it is shown.
	 * This is what you pass to Editor.openWindow();. These parameters will not take effect until the openWindow() is called in the editor.
	 * @class EditorWindow
	 * @param {String} name The name of the window.
	 * @param {Object} attrs Attributes for the window. Current attributes used are : height and width
	*/
	YAHOO.widget.EditorWindow = function(name, attrs) {
		/**
		* @private
		* @property name
		* @description A unique name for the window
		*/
		this.name = name.replace(' ', '_');
		/**
		* @private
		* @property attrs
		* @description The window attributes
		*/
		this.attrs = attrs;
	};

	YAHOO.widget.EditorWindow.prototype = {
		/**
		* @private
		* @property header
		* @description Holder for the header of the window, used in Editor.openWindow
		*/
		header: null,
		/**
		* @private
		* @property body
		* @description Holder for the body of the window, used in Editor.openWindow
		*/
		body: null,
		/**
		* @private
		* @property footer
		* @description Holder for the footer of the window, used in Editor.openWindow
		*/
		footer: null,
		/**
		* @method setHeader
		* @description Sets the header for the window.
		* @param {String/HTMLElement} str The string or DOM reference to be used as the windows header.
		*/
		setHeader: function(str) {
			this.header = str;
		},
		/**
		* @method setBody
		* @description Sets the body for the window.
		* @param {String/HTMLElement} str The string or DOM reference to be used as the windows body.
		*/
		setBody: function(str) {
			this.body = str;
		},
		/**
		* @method setFooter
		* @description Sets the footer for the window.
		* @param {String/HTMLElement} str The string or DOM reference to be used as the windows footer.
		*/
		setFooter: function(str) {
			this.footer = str;
		},
		/**
		* @method toString
		* @description Returns a string representing the EditorWindow.
		* @return {String}
		*/
		toString: function() {
			return 'Editor Window (' + this.name + ')';
		}
	};
})();