<html>
    <head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="css/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="css/js/bootstrap.min.js"></script>
        <title>
            Delete expense name
        </title>
    </head>
    <body>
	<?php
	include "nav.php";
	?>
	<div class="well well-lg" style="margin-top:80px;text-align:center;">
        <form method="post" action="/kadai/delexp2.php">
            Expense name:
        <select name="exname">
            <option>NULL             
            </option>
            <?php
            include "dbconnect.php";
            $sql="SELECT exname FROM expname";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option>{$row['exname']}</option>";
            }
            ?>
        </select>
		<input type="submit" value="delete" name="delete">
        </form>
		</div>
    </body>
</html>