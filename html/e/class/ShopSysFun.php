<?php
//声名购物车
function SetBuycar($buycar){
	$set=esetcookie("mybuycar",$buycar,0);
	return $set;
}

//清空购物车
function ClearBuycar(){
	SetBuycar("");
	Header("Refresh:0; URL=../ShopSys/buycar/");
}

//返回数量
function ReturnBuycarProductNum($num){
	$num=(int)$num;
	if($num<1)
	{
		$num=1;
	}
	return $num;
}

//加入购物车
function AddBuycar($classid,$id){
	global $class_r,$empire,$dbtbpre,$public_r;
	$classid=(int)$classid;
	$id=(int)$id;
	if(empty($classid)||empty($id)||empty($class_r[$classid][tbname]))
	{
		printerror("NotChangeProduct","history.go(-1)",1);
    }
	//验证产品是否存在
	$num=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where classid='$classid' and id='$id' limit 1");
	if(!$num)
	{
		printerror("NotChangeProduct","history.go(-1)",1);
	}
	$record="!";
	$field="|";
	$productid=$classid.",".$id;
	$buycar=getcvar('mybuycar');
	//重复
	if(strstr($buycar,"|".$productid."|"))
	{
		$pr=explode("|".$productid."|",$buycar);
		$pr1=explode("!",$pr[1]);
		$oldbuycar="|".$productid."|".$pr1[0]."!";
		//数量
		$pr1[0]=ReturnBuycarProductNum($pr1[0]);
		if(empty($pr1[0]))
		{
			$pr1[0]=1;
		}
		$newnum=$pr1[0]+1;
		$newbuycar="|".$productid."|".$newnum."!";
		$buycar=str_replace($oldbuycar,$newbuycar,$buycar);
	}
	else
	{
		//只存放一个
		if($public_r['buycarnum']==1)
		{
			$buycar='';
		}
		$buycar.="|".$productid."|1!";
	}
	SetBuycar($buycar);
	Header("Refresh:0; URL=../ShopSys/buycar/");
}

//修改购物车
function EditBuycar($add){
	$record="!";
	$field="|";
	$productid=$add['productid'];
	$num=$add['num'];
	$del=$add['del'];
	$count=count($productid);
	$buycar="";
	for($i=0;$i<$count;$i++)
	{
		$productid[$i]=RepPostVar($productid[$i]);
		$num[$i]=intval($num[$i]);
		//验证是否删除项
		if(empty($num[$i]))
		{
			continue;
	    }
		$isdel=0;
		for($j=0;$j<count($del);$j++)
		{
			if($del[$j]==$productid[$i])
			{
				$isdel=1;
				break;
			}
		}
		if($isdel==1)
		{
			continue;
		}
		$num[$i]=ReturnBuycarProductNum($num[$i]);
		$buycar.="|".$productid[$i]."|".$num[$i]."!";
    }
	SetBuycar($buycar);
	Header("Refresh:0; URL=../ShopSys/buycar/");
}

//验证提交权限
function ShopCheckAddDdGroup(){
	global $public_r;
	//限制下单会员
	if($public_r['shopddgroupid'])
	{
		if(!getcvar('mluserid'))
		{
			$phpmyself=urlencode($_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"]);
			$gotourl=$public_r['newsurl']."e/member/login/login.php?prt=1&from=".$phpmyself;
			$petype=1;
			printerror("NotLogin",$gotourl,$petype);
		}
	}
}

//增加订单
function AddDd($add){
	global $empire,$user_tablename,$user_money,$user_userid,$user_userfen,$user_rnd,$public_r,$dbtbpre;
	//验证权限
	ShopCheckAddDdGroup();
	//购物车无内容
	if(!getcvar('mybuycar'))
	{
		printerror("EmptyBuycar","history.go(-1)",1);
    }
	$add[ddno]=RepPostVar($add[ddno]);
	$add[truename]=RepPostStr($add[truename]);
	$add[oicq]=RepPostStr($add[oicq]);
	$add[msn]=RepPostStr($add[msn]);
	$add[call]=RepPostStr($add[call]);
	$add[phone]=RepPostStr($add[phone]);
	$add[email]=RepPostStr($add[email]);
	$add[address]=RepPostStr($add[address]);
	$add[zip]=RepPostStr($add[zip]);
	$add[bz]=RepPostStr($add[bz]);
	$add[g_truename]=RepPostStr($add[g_truename]);
	$add[g_oicq]=RepPostStr($add[g_oicq]);
	$add[g_msn]=RepPostStr($add[g_msn]);
	$add[g_call]=RepPostStr($add[g_call]);
	$add[g_phone]=RepPostStr($add[g_phone]);
	$add[g_email]=RepPostStr($add[g_email]);
	$add[g_address]=RepPostStr($add[g_address]);
	$add[g_zip]=RepPostStr($add[g_zip]);
	$add[fptt]=RepPostStr($add[fptt]);
	$add[fp]=(int)$add[fp];
	$add[psid]=(int)$add[psid];
	$add[payfsid]=(int)$add[payfsid];
	if(!$add[truename]||!$add[call]||!$add[email]||!$add[address]||!$add[g_truename]||!$add[g_call]||!$add[g_address]||!$add[g_email]||!$add[psid]||!$add[payfsid])
	{
		printerror("MustEnterSelect","history.go(-1)",1);
    }
	$mess="AddDdSuccess";
	$haveprice=0;
	$payby=0;
	//返回购物车存放格式
	$buyr=ReturnBuycardd();
	$alltotal=$buyr[2];
	$alltotalfen=$buyr[1];
	$buycar=$buyr[3];
	//发票
	$fptotal=0;
	if($add[fp])
	{
		$fptotal=$alltotal*($public_r[fpnum]/100);
	}
	//配送方式
	$pr=$empire->fetch1("select pid,pname,price from {$dbtbpre}enewsshopps where pid='$add[psid]'");
	if(empty($pr[pid]))
	{
		printerror("NotPsid","history.go(-1)",1);
	}
	//支付方式
	$payr=$empire->fetch1("select payid,payname,payurl,userpay,userfen from {$dbtbpre}enewsshoppayfs where payid='$add[payfsid]'");
	if(empty($payr[payid]))
	{
		printerror("NotPayfsid","history.go(-1)",1);
	}
	//取得用户信息
	$userid=(int)getcvar('mluserid');
	$username=RepPostVar(getcvar('mlusername'));
	if($userid)
	{
		$rnd=RepPostVar(getcvar('mlrnd'));
		$user=$empire->fetch1("select ".$user_userid.",".$user_money.",".$user_userfen." from ".$user_tablename." where ".$user_userid."='$userid' and ".$user_rnd."='$rnd' limit 1");
		if(!$user[$user_userid])
		{
			printerror("MustSingleUser","history.go(-1)",1);
		}
	}
	$location="../ShopSys/buycar/";
	//直接扣点
	if($payr[userfen])
	{
		if($buyr[0])
		{
			printerror("NotProductForBuyfen","history.go(-1)",1);
		}
		else
		{
			if($userid)
			{
				$buyallfen=$alltotalfen+$pr[price];
				if($buyallfen>$user[$user_userfen])
				{
					printerror("NotEnoughFenBuy","history.go(-1)",1);
				}
				//扣除点数
				$usql=$empire->query("update ".$user_tablename." set ".$user_userfen."=".$user_userfen."-".$buyallfen." where ".$user_userid."='$userid'");
				if($usql)
				{
					$mess="AddDdSuccessa";
					$payby=1;
					$haveprice=1;
				}
			}
			else
			{
				printerror("NotLoginTobuy","history.go(-1)",1);
			}
		}
	}
	//帐号余额扣除
	elseif($payr[userpay])
	{
		    if($userid)
			{
				$buyallmoney=$alltotal+$pr[price]+$fptotal;
				if($buyallmoney>$user[$user_money])
				{
					printerror("NotEnoughMoneyBuy","history.go(-1)",1);
				}
				//扣除金额
				$usql=$empire->query("update ".$user_tablename." set ".$user_money."=".$user_money."-".$buyallmoney." where ".$user_userid."='$userid'");
				if($usql)
				{
					$mess="AddDdSuccessa";
					$payby=2;
					$haveprice=1;
				}
			}
			else
			{
				printerror("NotLoginTobuy","history.go(-1)",1);
			}
	}
	//在线支付
	elseif($payr[payurl])
	{
		$mess="AddDdAndToPaySuccess";
		$location=$payr[payurl];
	}
	else
	{}
	$ddtime=date("Y-m-d H:i:s");
	$pr[price]=(float)$pr[price];
	$alltotal=(float)$alltotal;
	$alltotalfen=(float)$alltotalfen;
	$fptotal=(float)$fptotal;
	$sql=$empire->query("insert into {$dbtbpre}enewsshopdd(ddno,ddtime,userid,username,outproduct,haveprice,checked,truename,oicq,msn,email,`call`,phone,address,zip,bz,g_truename,g_oicq,g_msn,g_email,g_call,g_phone,g_address,g_zip,buycar,psid,psname,pstotal,alltotal,payfsid,payfsname,payby,alltotalfen,fp,fptt,fptotal) values('$add[ddno]','$ddtime',$userid,'$username',0,'$haveprice',0,'$add[truename]','$add[oicq]','$add[msn]','$add[email]','$add[call]','$add[phone]','$add[address]','$add[zip]','$add[bz]','$add[g_truename]','$add[g_oicq]','$add[g_msn]','$add[g_email]','$add[g_call]','$add[g_phone]','$add[g_address]','$add[g_zip]','".addslashes($buycar)."','$add[psid]','$pr[pname]',$pr[price],$alltotal,'$add[payfsid]','$payr[payname]','$payby',$alltotalfen,$add[fp],'$add[fptt]',$fptotal);");
	if($sql)
	{
		$ddid=$empire->lastid();
		$set=esetcookie("paymoneyddid",$ddid,0);
		SetBuycar("");
		printerror($mess,$location,1);
	}
	else
	{
		printerror("DbError","history.go(-1)",1);
	}
}

//返回购物车数据
function ReturnBuycardd(){
	global $empire,$class_r,$dbtbpre;
	$buycar=getcvar('mybuycar');
	$record="!";
	$field="|";
	$r=explode($record,$buycar);
	$alltotal=0;
	$return[0]=0;//是否全部积分
	$return[1]=0;//购买总积分
	$return[2]=0;//购买总金额
	$return[3]="";//存放格式
	$newbuycar="";
	for($i=0;$i<count($r)-1;$i++)
	{
		$pr=explode($field,$r[$i]);
		$productid=$pr[1];
		$fr=explode(",",$pr[1]);
		//ID
		$classid=(int)$fr[0];
		$id=(int)$fr[1];
		if(empty($class_r[$classid][tbname]))
		{
			continue;
		}
		//数量
		$num=ReturnBuycarProductNum($pr[2]);
		if(empty($num))
		{
			$num=1;
		}
		//取得产品信息
		$productr=$empire->fetch1("select title,tprice,price,titleurl,groupid,classid,newspath,filename,id,titlepic,buyfen from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where classid='$classid' and id='$id' limit 1");
		if(empty($productr[id]))
		{
			continue;
		}
		//是否全部积分
		if(!$productr[buyfen])
		{
			$return[0]=1;
		}
		$return[1]+=$productr[buyfen]*$num;
		$thistotal=$productr[price]*$num;
		$alltotal+=$thistotal;
		//组成存放的格式
		$title=str_replace("!","",$productr[title]);
		$title=str_replace("|","",$title);
		$title=str_replace(",","",$title);
		$newbuycar.="|".$classid.",".$id."|".$num."|".$productr[price]."|".$productr[buyfen]."|".$title."!";
    }
	$return[2]=$alltotal;
	$return[3]=$newbuycar;
	return $return;
}

//未付款的继续支付
function ShopDdToPay($ddid){
	global $empire,$dbtbpre;
	$ddid=(int)$ddid;
	if(!$ddid)
	{
		printerror("NotShopDdId","history.go(-1)",1);
	}
	//是否登陆
	$user_r=islogin();
	$r=$empire->fetch1("select ddid,payfsid,haveprice from {$dbtbpre}enewsshopdd where ddid='$ddid' and userid='$user_r[userid]' limit 1");
	if(!$r['ddid'])
	{
		printerror("NotShopDdId","history.go(-1)",1);
	}
	if($r['haveprice'])
	{
		printerror("ShopDdIdHavePrice","history.go(-1)",1);
	}
	if(empty($r['payfsid']))
	{
		printerror("NotPayfsid","history.go(-1)",1);
	}
	//支付方式
	$payr=$empire->fetch1("select payid,payurl from {$dbtbpre}enewsshoppayfs where payid='$r[payfsid]'");
	if(!$payr['payid']||!$payr['payurl'])
	{
		printerror("NotPayfsid","history.go(-1)",1);
	}
	$location=$payr['payurl'];
	esetcookie("paymoneyddid",$ddid,0);
	Header("Refresh:0; URL=$location");
}
?>