<?php include"dbconnect.php"?>
<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="css/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="css/js/bootstrap.min.js"></script>
        <title>
            Edit party
        </title>
    </head>
    <body>
<?php
	include "nav.php";
	?>
	<div class="well well-lg" style="margin-top:80px;text-align:center;">
	<form method="post" action="/kadai/edititem2.php">
        Item list:
    <select name="item">
        <option>NULL</option>
         <?php
            $sql="SELECT iname FROM itemlist";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option>{$row['iname']}</option>";
            }
            ?>
        </select>
        <input type="submit" value="submit">
        </form>
		</div>
    </body>
</html>