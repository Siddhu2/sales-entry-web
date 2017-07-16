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
Total amount
</th>
</tr>
<?php
$sno=1;
$all=$_POST['myInputs'][0];
$query=$con->query("SELECT iname,ino FROM itemlist");
$iname= Array();
$ino= Array();
$c=0;
while($result=$query->fetch_assoc())
{
	$iname[]=$result['iname'];
	$ino[]=$result['ino'];
	$c++;
}
if($all=="ALL")
{
for($i=0;$i<$c;$i++)
{
	$query=mysqli_query($con,"SELECT SUM(amount) FROM sales WHERE('".$ino[$i]."'=ino AND date>='".$fdate."' AND date<='".$tdate."')");
	$total= mysqli_fetch_row($query);
	$sum=$total[0];
		if($sum!=0)
		{
	echo "<tr><td>".$sno."</td>";
	echo "<td>".$iname[$i]."</td>";
	echo "<td>".$sum."</td></tr>";
	$sno++;
		}
}
}
else
{
foreach($_POST['myInputs'] as $i => $iname)
{
	$ino=$con->query("SELECT ino FROM itemlist WHERE iname='".$iname."'")->fetch_object()->ino;
	$query=mysqli_query($con,"SELECT SUM(amount) FROM sales WHERE('".$ino."'=ino AND date>='".$fdate."' AND date<='".$tdate."')");
	$total= mysqli_fetch_row($query);
	$sum=$total[0];
	if($sum!=0)
	{
	echo "<tr><td>".$sno."</td><td>".$iname."</td><td>".$sum."</td></tr>"; 
	++$sno;
	}
}
}
?>
</table>
</div>
</body>
</html>