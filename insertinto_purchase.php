<?php
include "dbconnect.php";
$date=$_POST['date'];
list($ye,$m,$d)=explode("-",$date);
$y=$ye%100;
$sql="SELECT pid FROM purchase ORDER BY pid DESC";
$result=mysqli_query($con,$sql);
$last=mysqli_fetch_assoc($result);
$bmo=substr($last['pid'],2,2);
$bda=substr($last['pid'],4,2);
if($last['pid']==0)
{
	$billno=($y.$m.$d)*1000;
}
elseif($bmo==$m)
{
	$l=$last['pid']%1000;
	$l=str_pad($l+1,3,0,STR_PAD_LEFT);
	$billno=$y.$m.$d.$l;
}
else
{
	$billno=($y.$m.$d)*1000;
}
foreach($_POST['myInputs'] as $a => $i)
{
	$item=$_POST['myInputs'][$a];
	$amount=$_POST['amount'][$a];
	$pname=$_POST['pname'][$a];
	if($item=="NULL" && $amount==NULL)
	{
		$ino=0;
		$amount=0;
	}
	else{
	$ino=$con->query("SELECT ino FROM itemlist WHERE iname='".$item."'")->fetch_object()->ino;
	$pno=$con->query("SELECT pno FROM party WHERE pname='".$pname."'")->fetch_object()->pno;
	}
	mysqli_query($con,"INSERT INTO purchase (date,pid,ino,pno,amount) VALUES('$date','$billno',$ino,$pno,$amount)");
}
	echo "Sales entry is added!!";
	header("refresh:2;url=purchase.php");
?>