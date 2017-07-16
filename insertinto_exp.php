<?php
include "dbconnect.php";
$date=$_POST['date'];
list($ye,$m,$d)=explode("-",$date);
$y=$ye%100;
$sql="SELECT expnum FROM expenditure ORDER BY expnum DESC";
$result=mysqli_query($con,$sql);
$last=mysqli_fetch_assoc($result);
$bmo=substr($last['expnum'],2,2);
$bda=substr($last['expnum'],4,2);
if($last['expnum']==0)
{
	$expnum=($y.$m.$d)*1000;
}
elseif($bmo==$m)
{
	$l=$last['expnum']%1000;
	$l=str_pad($l+1,3,0,STR_PAD_LEFT);
	$expnum=$y.$m.$d.$l;
}
else
{
	$expnum=($y.$m.$d)*1000;
}
foreach($_POST['myInputs'] as $a => $i)
{
	$expname=$_POST['myInputs'][$a];
	$amount=$_POST['amount'][$a];
	if($expname=="NULL" && $amount==NULL)
	{
		$exno=0;
		$amount=0;
	}
	else{
	$exno=$con->query("SELECT exno FROM expname WHERE exname='".$expname."'")->fetch_object()->exno;
	}
	mysqli_query($con,"INSERT INTO expenditure (date,expnum,exno,amount) VALUES('$date','$expnum',$exno,$amount)");
	echo "Expenditure is added!!";
	header("refresh:2;url=expenditure.php");
	
}
?>