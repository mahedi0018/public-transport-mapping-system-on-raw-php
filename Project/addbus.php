<?php
session_start();
include_once('db.php');
if(isset($_SESSION['adminname'])){
if(isset($_POST['submit']) && isset($_POST['name']) &&  !empty($_POST['name'])) {
	$sql="INSERT INTO bus VALUES('','".stripslashes(mysql_real_escape_string($_POST['name']))."')";
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
	$sql="SELECT * FROM bus";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			echo $row['id'].' : '.$row['bus_name'].'<br>';
		} 
	}
?>
<form action="" method="post">
Add Bus Name: <input type="text" name="name"><br>
<input type="submit" name="submit" value="Add"><br>
</form>
<a href = "logout.php" tite = "Logout">Logout
</body>
</html>