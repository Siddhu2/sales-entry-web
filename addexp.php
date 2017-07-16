<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="css/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="css/js/bootstrap.min.js"></script>
        <title>
            Add item
        </title>
    </head>
    <body>
	<?php
	include "nav.php";
	include "dbconnect.php";
	?>
	<div class="well well-lg" style="margin-top:80px;text-align:center;">
        <form action="" method="post">
        <input type="text" placeholder="Enter expense name" name="expname" required/>
        <input type="submit" value="submit">
        </form>
		</div>
    </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $expname=$_POST['expname'];
    $sql="INSERT INTO expname (exname) VALUES ('$expname')";
    $con->query($sql);
}
?>