<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="css/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="css/js/bootstrap.min.js"></script>
        <title>
            Add party name
        </title>
    </head>
    <body>
	<?php
	include "nav.php";
	include "dbconnect.php";
	?>
	<div class="well well-lg" style="margin-top:80px;text-align:center;">
        <form action="" method="post">
        <input type="text" placeholder="Enter party name" name="party" required/>
        <input type="submit" value="submit">
        </form>
		</div>
    </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $partyname=$_POST['party'];
    $sql="INSERT INTO party (pname) VALUES ('$partyname')";
    $con->query($sql);
}
?>