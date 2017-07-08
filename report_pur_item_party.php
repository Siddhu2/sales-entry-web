<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="css/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="css/js/bootstrap.min.js"></script>
<title>
Report by item
</title>
<?php
include "dbconnect.php";
?>
<script type="text/javascript">
var count=1;
function addInput(div)
{
	
	xmlhttp= new XMLHttpRequest();
	xmlhtt= new XMLHttpRequest(); 
	xmlhttp.onreadystatechange = function()
	xmlhtt.onreadystatechange= function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var newdiv = document.createElement('div');
			
			newdiv.innerHTML = (++count)+"<select name='myInputs[]'><option>NULL</option>"+xmlhttp.responseText+"</select>&nbsp;&nbsp;<select name='pname[]'><option>NULL</option>"+xmlhtt.responseText+"</select>";
		}
		document.getElementById(div).appendChild(newdiv);
	}
	xmlhttp.open("GET","update_text.php",false);
	xmlhtt.open("GET","update.php",false);
	xmlhttp.send();
	xmlhtt.send();
}
</script>
</head>
<body>
    <?php
	include "nav.php";
	?>
	<div class="well well-lg" style="margin-top:80px;text-align:center;">
<form method="POST" action="report_pur_item_partydb.php">
From date:<input type="date" value="<?php echo date('y-04-01');?>" name="fdate">&nbsp;
To date:<input type="date" value="<?php echo date('y-m-d');?>" name="tdate">
<br>

<div id="dynamicInput">
1 Item name:<select name="myInputs[]">
<option>NULL</option>
<?php 
            $sql="SELECT iname FROM itemlist";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option>{$row['iname']}</option>";
            }
?>
<option>ALL</option>
</select>
Party name:
<select name="pname[]">
<option>NULL</option>
<?php 
            $sql="SELECT pname FROM party";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option>{$row['pname']}</option>";
            }
?>
</div>
<br>
<input type="button" value="Add" onClick="addInput('dynamicInput');">
<input type="submit" value="submit">
</form>
</div>
</body>
</html>