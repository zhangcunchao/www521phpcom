/**
 * Imagevue Window v1.0
 * Javascript window resize- and reposition tools
 */
iresize = function(w,h) {
	if (window.innerWidth){
		var myw = window.innerWidth;
		var myh = window.innerHeight;
	} else {
		var myw = document.body.clientWidth;
		var myh = document.body.clientHeight;
	}
	if(w>screen.availWidth){
		w = screen.availWidth-50;
	}
	if(h>screen.availHeight){
		h = screen.availHeight-50;
	}
	nw = w-myw;
	nh = h-myh;
	nx = -Math.round(nw/2);
	ny = -Math.round(nh/2);
	myint = setInterval(dob,100);
};
dob = function(){
	clearInterval(myint);
	resizeBy(nw, nh);
	moveBy(nx, ny);
};
resizetoimage = function(){
	if( !document.images.length ) { document.images[0] = document.layers[0].images[0]; };
    var oH = document.images[0].height+24;
	var oW = document.images[0].width+20;
    if( !oH || window.doneAlready ) { return; };
    window.doneAlready = true;
    var x = window;
	x.resizeTo( oW + 200, oH + 200 );
    var myW = 0, myH = 0, d = x.document.documentElement, b = x.document.body;
    if( x.innerWidth ) { myW = x.innerWidth; myH = x.innerHeight }
    else if( d && d.clientWidth ) { myW = d.clientWidth; myH = d.clientHeight; }
    else if( b && b.clientWidth ) { myW = b.clientWidth; myH = b.clientHeight; };
    if( window.opera && !document.childNodes ) { myW += 16; };
	var myw = oW + ( ( oW + 200 ) - myW );
	var myh = oH + ( (oH + 200 ) - myH );
	if(myw > screen.availWidth){
		myw = screen.availWidth;
	}
	if(myh > screen.availHeight){
		myh = screen.availHeight;
	}
    x.resizeTo( myw, myh );
    var scW = screen.availWidth ? screen.availWidth : screen.width;
    var scH = screen.availHeight ? screen.availHeight : screen.height;
    if( !window.opera ) { x.moveTo(Math.round((scW-myw)/2),Math.round((scH-myh)/2)); };
}