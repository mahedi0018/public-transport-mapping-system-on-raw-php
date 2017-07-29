<?php
session_start();
include_once('db.php');
if(isset($_SESSION['adminname'])){
if(isset($_POST['submit'])) {
	foreach($_POST['place'] as $value) {
		$sql="INSERT INTO stoppage VALUES('','".$_POST['bus_name']."','".$value."')";
		mysql_query($sql);
		echo 'ADDED<br>';
	}
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
	$sql="SELECT * FROM stoppage";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			echo $row['id'].' : '.$row['bus_name'].' : '.$row['place'].'<br>';
		} 
	}
?>
<form action="" method="post">
<p>Bus: <select name="bus_name">
<?php
	$sql="SELECT * FROM bus";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			echo '<option>'.$row['bus_name'].'</option>';
		} 
	}
?>
</select><br>
<?php
	$sql="SELECT * FROM map";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			echo '<input type="checkbox" name="place[]" value="'.$row['location'].'">'.$row['location'].'<br>';
		} 
	}
?>
<input type="submit" name="submit" value="Add"><br>
</form>
<a href = "logout.php" tite = "Logout">Logout
</body>
</html>