<?php
session_start();
include_once('db.php');
if(isset($_SESSION['adminname'])){
if(isset($_POST['submit'])) {
	$sql="INSERT INTO node VALUES('','".$_POST['node1']."','".$_POST['node2']."')";
	mysql_query($sql);
	echo 'ADDED<br>';
}
}
else {
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Location</title>
</head>
<style>
	body{
	    background: darkgray;
		background-size: 100%;
	 }
</style>
<body>
<?php
	$sql="SELECT * FROM node";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			echo $row['node1'].' : '.$row['node2'].'<br>';
		} 
	}
?>
<form action="" method="post">
<p>Node1 : <select name="node1">
<?php
	$sql="SELECT * FROM map";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			echo '<option>'.$row['location'].'</option>';
		} 
	}
?>
</select>
Node2 : <select name="node2">
<?php
	$sql="SELECT * FROM map";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			echo '<option>'.$row['location'].'</option>';
		} 
	}
?>
</select>
</p>
<p><input type="submit" name="submit" value="Add"></p><br>
</form>
<a href = "logout.php" tite = "Logout">Logout
</body>
</html>