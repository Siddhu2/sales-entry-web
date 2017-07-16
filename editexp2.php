<?php
include"dbconnect.php";
session_start();
$exname=$_POST['exp'];
if($item!="NULL")
{
$sql=$con->query("SELECT exno FROM expname WHERE exname='$exname'")->fetch_object()->exno;
$_SESSION['exno']=$sql;
}
else
{
	echo "Please select an expenditure name!!";
	header("refresh:3;url=editexp.php");
}
?>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <title>Edit expense name</title>
    </head>
    <body>
	<?php
	include "nav.php";
	?>
	<div class="well well-lg" style="margin-top:80px;text-align:center;">
    <form method="post" action="/kadai/replace_exp.php">
    <input type="text" name="exname" value="<?php echo $exname;?>" placeholder="Item to be edited" required>
        <input type="submit" name="replace" value="Replace">
        </form>
		</div>
    </body>
</html>

