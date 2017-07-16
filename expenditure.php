<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="css/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="css/js/bootstrap.min.js"></script>
<title>
Sales
</title>
<?php
include "dbconnect.php";
?>
<script type="text/javascript">
var count=1;
function addInput(div)
{
	
	xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var newdiv = document.createElement('div');
			
			newdiv.innerHTML = (++count)+"<select name='myInputs[]'><option>NULL</option>"+xmlhttp.responseText+"</select>&nbsp;&nbsp;<input type='text' name='amount[]' id='amount' placeholder='amount'>";
		}
		document.getElementById(div).appendChild(newdiv);
	}
	xmlhttp.open("GET","update_exp.php",false);
	xmlhttp.send();
}
function sum()
{
	var sum=0;
	var a=document.getElementsByName("amount[]");
	
	for(var i=0;i<count;i++)
	{
		 var n=a[i].value;
		 sum= +sum + +n;
	}
	var total=document.getElementById('total');
	total.value=sum;
	
}
</script>
</head>
<body>
    <?php
	include "nav.php";
	?>
	<div class="well well-lg" style="margin-top:80px;text-align:center;">
<form method="POST" action="insertinto_exp.php">
Date:<input type="date" name="date" value="<?php echo date('Y-m-d'); ?>"><br><br>
<div id="dynamicInput">
1<select name="myInputs[]">
<option>NULL</option>
<?php 
            $sql="SELECT exname FROM expname";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option>{$row['exname']}</option>";
            }
?>
</select>&nbsp;
<input type="text" name="amount[]" placeholder="amount">

</div>
<br>
<input type="button" value="Add" onClick="addInput('dynamicInput');">
<input type="text" name="total" id="total" readonly="true" style="margin-right=100px;">
<input type="button" value="Total" onClick="sum()">

<br>

<input type="submit" value="submit">
</form>
</div>
</body>
</html>