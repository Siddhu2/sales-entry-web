<?php
include"dbconnect.php";
session_start();
$item=$_POST['item'];
if($item!="NULL")
{
$sql=$con->query("SELECT ino FROM itemlist WHERE iname='$item'")->fetch_object()->ino;
$_SESSION['ino']=$sql;
}
else
{
	echo "Please select an item!!";
	header("refresh:3;url=edititem.php");
}
?>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <title>Edit item</title>
    </head>
    <body>
	<?php
	include "nav.php";
	?>
	<div class="well well-lg" style="margin-top:80px;text-align:center;">
    <form method="post" action="/kadai/replace.php">
    <input type="text" name="eitem" value="<?php echo $item;?>" placeholder="Item to be edited" required>
        <input type="submit" name="replace" value="Replace">
        </form>
		</div>
    </body>
</html>

