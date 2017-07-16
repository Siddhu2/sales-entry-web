<?php
include 'dbconnect.php';
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="css/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="css/js/bootstrap.min.js"></script>
<?php
include 'nav.php';
?>
<title>
Report by item and date
</title>
</head>
<body>
<div class="well well-lg" style="margin-top:80px;text-align:center;">
<table class="table table-striped">
<tr>
<th colspan="3" style="text-align:center;">
Date:<?php echo $fdate." To ".$tdate; ?>
</th>
</tr>
<tr>
<th>
S.no
</th>
<th>
Item name
</th>
<th>
Party name
</th>
<th>
Total amount
</th>
</tr>
<?php
$sno=1;
$iall=$_POST['myInputs'][0];
$pall=$_POST['pname'][0];
$query=$con->query("SELECT iname,ino FROM itemlist");
	$sql=$con->query("SELECT pname,pno FROM party");
$iname= Array();
$ino= Array();
$pname= Array();
$pno= Array();
$c=0;
while($result=$query->fetch_assoc())
{
	$iname[]=$result['iname'];
	$ino[]=$result['ino'];
	$c++;
}
$s=0;
while($result=$sql->fetch_assoc())
{
	$pname[]=$result['pname'];
	$pno[]=$result['pno'];
	$s++;
}

foreach($_POST['myInputs'] as $i => $iname)
{
	$pname=$_POST['pname'][$i];
	$pno=$con->query("SELECT pno FROM party WHERE pname='".$pname."'")->fetch_object()->pno;
	$ino=$con->query("SELECT ino FROM itemlist WHERE iname='".$iname."'")->fetch_object()->ino;
	$query=mysqli_query($con,"SELECT SUM(amount) FROM purchase WHERE('".$ino."'=ino AND date>='".$fdate."' AND date<='".$tdate."' AND pno=".$pno.")");
	$total= mysqli_fetch_row($query);
	$sum=$total[0];
	if($sum!=0)
	{
	echo "<tr><td>".$sno."</td><td>".$iname."</td><td>".$pname."</td><td>".$sum."</td></tr>"; 
	++$sno;
	}
}
?>
</table>
</div>
</body>
</html>