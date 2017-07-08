<?php
include "dbconnect.php";
$sql="SELECT pname FROM party";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option>{$row['pname']}</option>";
            }
?>