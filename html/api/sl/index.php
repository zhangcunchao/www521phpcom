<?php  
error_reporting(E_ALL ^ E_NOTICE);
$init = $_POST["init"];//game restart  
$clickvalue = $_POST["clickvalue"];//minesweeping  
$checkflag = 0;//Victory or defeat  
$click_count = 0;//clicks count  
if($init == null && $clickvalue == null){//initialization  
    $_POST = array();//set POST with a array  
    $_POST["rows"] = 9;//set rows  
    $_POST["cols"] = 9;//set cols  
    $_POST["num"] = 10;//set num  
    $_POST["timeshow"] = "00:00"; //set starttime  
    $init = true;//set initialization  
}  
$rows = $_POST["rows"];//get rows  
$cols = $_POST["cols"];//get cols  
$num = $_POST["num"];//get num  
$starttime = $_POST["starttime"];//get starttime  
if($init){// is initialization  
    $timeshow = "00:00";//set starttime  
    $data = array();//data initialization  
    for($i=0;$i<$rows;$i++){//all the rows  
        for($j=0;$j<$cols;$j++){//all the cols  
            $data["data".$i."_".$j] = 0;//set mine with null  
            $data["open".$i."_".$j] = 0;//set node with close  
        }  
    }  
    $i=0;//reset the index,and set the mines(Random setting)  
    while($i < $num){//number of mine  
        $r = rand(0,$rows - 1);//row's index  
        $c = rand(0,$cols - 1);//col's index  
        if($data["data".$r."_".$c] == 0){//if not a mine  
            $data["data".$r."_".$c] = 100;//set the node with a mine  
            $i++;  
        }  
    }  
    for($i=0;$i<$rows;$i++){//all the rows  
        for($j=0;$j<$cols;$j++){//all the cols  
            if($data["data".$i."_".$j] == 100)continue;//is not a mine , set number of adjacent mines   
            $cnt = 0;  
            if($i - 1 >= 0 && $j - 1 >= 0 && $data["data".($i - 1)."_".($j - 1)] == 100)$cnt++;//upper left  
            if($i - 1 >= 0 && $data["data".($i - 1)."_".$j] == 100)$cnt++;//left  
            if($i - 1 >= 0 && $j + 1 < $cols && $data["data".($i - 1)."_".($j + 1)] == 100)$cnt++;//lower left  
            if($j - 1 >= 0 && $data["data".$i."_".($j - 1)] == 100)$cnt++;//upper  
            if($j + 1 < $cols && $data["data".$i."_".($j + 1)] == 100)$cnt++;//lower  
            if($i + 1 < $rows && $j - 1 >= 0 && $data["data".($i + 1)."_".($j - 1)] == 100)$cnt++;//upper right  
            if($i + 1 < $rows && $data["data".($i + 1)."_".$j] == 100)$cnt++;//right  
            if($i + 1 < $rows && $j + 1 < $cols && $data["data".($i + 1)."_".($j + 1)] == 100)$cnt++;//lower right  
            $data["data".$i."_".$j] = $cnt;//set number  
        }  
    }  
}else{  
    $data = $_POST;//get data  
    if($data["data".$clickvalue] == 100){//check the value of users click  
        $checkflag = 2;//if click on a mine,gameover  
        for($i=0;$i<$rows;$i++){//all the rows  
            for($j=0;$j<$cols;$j++){//all the cols  
                $data["open".$i."_".$j] = 1;//set all nodes to open  
            }  
        }  
    }else{  
        $node = explode("_", $clickvalue);//get the node of click  
        openNode($node[0],$node[1]);//set nodes to open  
        for($i=0;$i<$rows;$i++){//all the rows  
            for($j=0;$j<$cols;$j++){//all the cols   
                if($data["open".$i."_".$j] == 1)$click_count++;//get the number of opennode   
            }  
        }  
        if($rows*$cols - $click_count == $num)$checkflag = 1;//if all the node is open,game clear   
    }  
}  
if($checkflag == 0 && $click_count == 1){//if game is start ,time start  
    $starttime = date("H:i:s");  
}  
if($starttime){//Computing time and display  
    $now = date("H:i:s");  
    $nowlist = explode(":",$now);  
    $starttimelist = explode(":",$starttime);  
    $time_count = $nowlist[0]*3600+$nowlist[1]*60 + $nowlist[2] - ($starttimelist[0]*3600+$starttimelist[1]*60 + $starttimelist[2]);  
    $min = floor($time_count / 60);  
    $sec = $time_count % 60;  
    $timeshow = ($min>9?$min:"0".$min).":".($sec>9?$sec:"0".$sec);  
}else{  
    $timeshow = "00:00";//if game is stop , time stop  
}  
function openNode($i,$j){//set nodes to open,if it is can open  
    global $rows;//get the rows  
    global $cols;//get the cols  
    global $data;//get the data  
    if($i < 0 || $i >= $rows || $j < 0 || $j >= $cols || $data["open".$i."_".$j])return;//it is not a node,or it has been opened  
    $data["open".$i."_".$j] = 1;//open the node  
    if($data["data".$i."_".$j] > 0)return;//need to continue?  
    openNode($i - 1,$j - 1);  
    openNode($i - 1,$j);  
    openNode($i - 1,$j + 1);  
    openNode($i,$j - 1);  
    openNode($i,$j + 1);  
    openNode($i + 1,$j - 1);  
    openNode($i + 1,$j);  
    openNode($i + 1,$j + 1);  
}  
?>  
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  
<title>扫雷游戏 www.521php.com</title>  
</head>  
<body>  
<form action="" method="post">  
<input type="hidden" name="starttime" value="<?php echo $starttime;?>"/>  
<input type="hidden" name="clickvalue"/>  
<table style="top:10px;left:0px;z-index:0;margin:10px auto" border="1px">  
<tr>  
<td width="100px" align="center">  
    <table width="100%" border="1px">  
        <tr><td>行数:</td><td><input type="text" name="rows" value="<?php echo $rows;?>" size="1"/></td></tr>  
        <tr><td>列数</td><td><input type="text" name="cols" value="<?php echo $cols;?>" size="1"/></td></tr>  
        <tr><td>雷数:</td><td><input type="text" name="num" value="<?php echo $num;?>" size="1"/></td></tr>  
        <tr><td colspan="2" align="center"><input type="submit" value="重新开始" name="init"/></td></tr>  
    </table>  
</td>  
<td width="50px" align="center"><font size="10px"><?php echo $checkflag < 2?"☺":"☹";?></font></td>  
<td width="100px" align="center">  
<?php   
    if($checkflag == 1)echo "恭喜，雷全部清掉了!<br />";  
    else if($checkflag == 2)echo "太挫了，又被雷炸死了<br />";  
?>  
    <input type="text" name="timeshow" value="<?php echo $timeshow;?>" size="4" readonly >  
</td>  
</tr>  
</table>  
<table style="top:155px;left:0px;z-index:0;margin:10px auto" border="1px">  
<?php for($i=0;$i<$rows;$i++){ ?>  
    <tr>  
    <?php for($j=0;$j<$cols;$j++){    ?>  
        <td style="width:24px;height:24px;" align="center">  
        <input type="hidden" name="open<?php echo $i."_".$j;?>" value="<?php echo $data["open".$i."_".$j];?>">  
        <input type="hidden" name="data<?php echo $i."_".$j;?>" value="<?php echo $data["data".$i."_".$j];?>">  
        <?php if($data["open".$i."_".$j]){//show the value of node,if the node has been opened ?>  
            <?php echo $data["data".$i."_".$j]==100?"☀":$data["data".$i."_".$j];?>  
        <?php }else{//show a button ,if the node has not been opened ?>  
            <input type="button" value="" onclick="clickNum('<?php echo $i."_".$j;?>')"  style="width:20px;height:20px;">  
        <?php } ?>  
        </td>  
    <?php } ?>  
    </tr>  
<?php } ?>  
</table>  
</form>  
<script type="text/javascript">  
function clickNum(value){//click a node  
    <?php if($checkflag > 0)echo 'return;';//if game is clear or game is over ?>  
    document.forms[0].clickvalue.value = value;  
    document.forms[0].submit();  
}  
<?php if($checkflag == 0 && $click_count>0)echo 'setTimeout("timerun()",1000);';//time running ?>  
<?php if($checkflag == 1)echo 'alert("恭喜，雷全部清掉了!www.521php.com");';?>  
<?php if($checkflag == 2)echo 'alert("太挫了，又被雷炸死了");';?>  
function timerun(){//time running  
    var timelist = document.forms[0].timeshow.value.split(":");  
    var sec = parseInt(timelist[1],10) + 1;  
    var min = sec < 60?parseInt(timelist[0],10):(parseInt(timelist[0],10) + 1);  
    document.forms[0].timeshow.value = (min>9?min:"0"+min)+":"+(sec > 9?sec:"0"+sec);  
    setTimeout("timerun()",1000);  
}  
</script>
<span style="display:none;"><script src="http://s96.cnzz.com/stat.php?id=4200165&web_id=4200165" language="JavaScript"></script></span>
</body>  
</html>