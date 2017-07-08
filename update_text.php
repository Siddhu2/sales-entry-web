<?php
include "dbconnect.php";
$sql="SELECT iname FROM itemlist";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option>{$row['iname']}</option>";
            }
?>