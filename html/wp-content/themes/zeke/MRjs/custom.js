// 滑动特效
$(function() {
	// featured window effect
	$("#featured .item").hover(function(){
		$(this).find(".boxCaption").stop().animate({
			top:0
		}, 150);
		}, function(){
		$(this).find(".boxCaption").stop().animate({
			top:160
		}, 600);
	});
});
// 滚屏
jQuery(document).ready(function($){
$('#roll_top').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);}); 
$('#ct').click(function(){$('html,body').animate({scrollTop:$('.ct').offset().top}, 800);});
$('#fall').click(function(){$('html,body').animate({scrollTop:$('.footer_bottom,.footer_bottom_a').offset().top}, 800);});
});
// context
// 编辑显示
$(document).ready(function(){
$('.content_text').hover(
	function() {
		$(this).find('.admin').stop(true,true).fadeIn();
	},
	function() {
		$(this).find('.admin').stop(true,true).fadeOut();
	}
);
});
 // 阅读全文
$(document).ready(function() {
$('span.morehover').css('opacity', 0).hover(function () {
	$(this).stop().fadeTo(500, 1);
		},
	function () {
		$(this).stop().fadeTo(500, 0);
		});
});

 // 图片延迟加载
jQuery(document).ready(
function($){
$(".content_banner img,.comment img,.sid_link_img img").lazyload({
     placeholder : "/wp-content/themes/MRuu2011/MRimg/blank.gif",
     effect      : "fadeIn"
});
});

//图片淡入淡出的效果，为了页面加载效果，暂弃不用。
//$(function () {
//$('.content_banner_img img').hover(
//function() {$(this).fadeTo("fast", 0.5);},
//function() {$(this).fadeTo("fast", 1);
//});
//});
//$(document).ready(function(){$("a[rel='external'],a[rel='external nofollow']").click(function(){window.open(this.href);return false})})