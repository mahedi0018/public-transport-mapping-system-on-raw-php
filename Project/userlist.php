<?php
session_start();
include_once('db.php');
if(isset($_SESSION['adminname'])){
if(isset($_POST['Show User'])) {
	
}
}
else {
	header("location: adminwindow.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>User List</title>
</head>
<style>
	body{
	    
		background: cadetblue;
	 }
</style>	 
<body>
<h1>User List</h1>
<?php
	$sql="SELECT * FROM login";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			echo ''.$row['id'].'. '.$row['username'].'->'.'<a href = "deleteuser.php?id='.$row['id'].'" tite = "del">Delete</a>'.'<br>';
		} 
	}
?>

<a href = "logout.php" tite = "Logout">Logout
</body>
</html>