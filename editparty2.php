<?php
include"dbconnect.php";
session_start();
$pname=$_POST['party'];
if($item!="NULL")
{
$sql=$con->query("SELECT pno FROM party WHERE pname='$pname'")->fetch_object()->pno;
$_SESSION['pno']=$sql;
}
else
{
	echo "Please select an item!!";
	header("refresh:2;url=editparty.php");
}
?>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <title>Edit party name</title>
    </head>
    <body>
	<?php
	include "nav.php";
	?>
	<div class="well well-lg" style="margin-top:80px;text-align:center;">
    <form method="post" action="/kadai/replaceparty.php">
    <input type="text" name="eparty" value="<?php echo $pname;?>" placeholder="Party name to be edited" required>
        <input type="submit" name="replace" value="Replace">
        </form>
		</div>
    </body>
</html>

