function myhelp(myfocus, id) {
	// var e1 = $('h' + id);
	// var e2 = $('l' + id);
	// if(myfocus){
	// 	e1.style.display = 'block';
	// 	e2.className = 'active';
	// } else {
	// 	e1.style.display = 'none';
	// 	e2.className = '';
	// }
}

function toggle_all_files() {
	if ($('selected_files')) {
		var val = ($F('selected_files').length == 0);
		var select = $('selected_files');
		for (var i = 0; i < select.options.length; i++)
			select.options[i].selected = val;
		$('leftcontent').select('div.thumbitem.selectable').invoke((val ? 'addClassName' : 'removeClassName'), 'selected');
	}
}

function toggle_file(path) {
	var select = $('selected_files');
	for (var i = 0; i < select.options.length; i++)
		if (select.options[i].value == path)
			select.options[i].selected = !select.options[i].selected;
}

IV = {};

IV.CookieStorage = Class.create();
Object.extend(IV.CookieStorage.prototype, {
	initialize: function(className, selector, callback, applyOnInit) {
		this.cookieName = className;
		this.callback = callback;
		this.closed = [];
		this.readCookie();
		var arr = this.closed;
		if (applyOnInit)
			for (var i = 0; i < arr.length; i++)
				if ($(arr[i]))
					this.callback.apply(this, [$(arr[i])]);
		$$(selector).each(function (el) {
			$(el).observe('mousedown', (function (ev) {
				this.callback.apply(this, [ev.element()]);
				this.toggle(el);
			}).bindAsEventListener(this));
		}, this);
	},
	
	readCookie: function()
	{
		var allCookies = document.cookie;
		if (allCookies == '')
			return;
		var start = allCookies.indexOf(this.cookieName + '=');
		if (start == -1)
			return;
		start += this.cookieName.length + 1;
		var end = allCookies.indexOf(';', start);
		if (end == -1)
			end = allCookies.length;
		var val = allCookies.substring(start, end);
		this.closed = val.gsub('%2C', ',').split(',');
	},
	
	writeCookie: function()
	{
		var date = new Date();
		date.setFullYear(date.getFullYear() + 1);
		document.cookie = this.cookieName + '=' + this.closed.join(',') + '; expires=' + date.toGMTString();
	},
	
	add: function(id) {
		this.remove(id);
		this.closed.push(id);
		this.writeCookie();
	},
	
	remove: function(id) {
		var arr = [];
		for (var i = 0; i < this.closed.length; i++)
			if (id != this.closed[i])
				arr.push(this.closed[i]);
		this.closed = arr;
		this.writeCookie();
	},
	
	toggle: function(el) {
		var id = el.identify();
		if (-1 == this.closed.indexOf(id)) {
			this.add(id);
		} else {
			this.remove(id);
		}
	}
});

window.onload = function() {
	new IV.CookieStorage('ivrm', '.ivrm', function(el) {
		var el = $(el);
		if (el) {
			el.toggleClassName('hidden');
			el.next().toggle();
		}
	}, true);
	new IV.CookieStorage('ivconf', '.ivconf', function(el) {
		var el = $(el);
		if (el) {
			el.toggleClassName('open');
			el.next().toggle();
		}
	}, false);
	new IV.CookieStorage('editNextCheckbox', '#editNextCheckbox', function(el) {
		var el = $(el);
		if (el) {
			el.checked = !el.checked;
		}
	}, true);
}

// Upload
function submitUpload(forms)
{
	if (forms.length) {
		var form = $(forms.shift());
		$('myIframe').observe('load', function() {
			form.remove();
			submitUpload(forms);
		});
		form.submit();
	} else {
		location.href = location.href;
	}
}

function addUploadInput()
{
	var form = $('htmlUploader');
	if (form) {
		var clearFileInput = $(form.parentNode).select('input[type=file]').detect(function (input) {return ('' === input.value);});
		if (clearFileInput) {
			return false;
		}
		var newForm = form.cloneNode(false);
		var input = new Element('input');
		input.type = 'file';
		input.name = 'Filedata';
		newForm.appendChild(input);
		input.observe('change', addUploadInput);
		$('myIframe').insert({before: newForm});
	}
	return false;
}

Event.observe(window, 'load', function() {
	var form = $('htmlUploader');
	if (form) {
		form.select('input').each(function (input) {
			if ('submit' === input.type) {
				input.observe('click', function (ev) {
					var input = ev.element();
					input.disabled = true;
					submitUpload(input.previousSiblings()[0].select('form'));
				});
				$(form.parentNode).insert({after: input.remove()});
			} else if ('file' === input.type) {
				input.observe('change', addUploadInput);
			}
		});
	}
});

document.observe('dom:loaded', function() {
	$$('input.integer').each(function (el) {
		var options = new Object();
		$w(el.className).each(function (className) {
			if (className.startsWith('maxvalue_')) {
				options.max = new Number(className.substr(9));
			}
			if (className.startsWith('minvalue_')) {
				options.min = new Number(className.substr(9));
			}
		});
		new SpinButton(el, options);
	});
	$$('input.color').each(function (el) {
		new Control.ColorPicker(el);
	});
});