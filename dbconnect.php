<?php
$con=mysqli_connect("localhost","root","","kadai");
if(mysqli_connect_errno())
{
    echo "Failed to connect to Mysql:".mysqli_connect_error();
}
else
    echo"dbconnected!!";
?>