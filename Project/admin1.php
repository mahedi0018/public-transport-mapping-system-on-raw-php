<!DOCTYPE html>
<html>
<body>

<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "project";
$tbl_name="admin"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


// username and password sent from form 
$adminname = $_POST["adminname"];
$password = $_POST["password"];

// To protect MySQL injection
$adminname = stripslashes($adminname);
$password = stripslashes($password);
$adminname = mysql_real_escape_string($adminname);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM $tbl_name WHERE adminname='$adminname' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $username and $password, table row must be 1 row
  if($count==1){
	// Register $adminname, $mypassword and redirect to file "login_success.php"
		session_start();
		$_SESSION['adminname']=$adminname;
		header("location: adminwindow.php");

	}
  else {
	  header("location: admin.php");
	echo "Wrong adminname or Password";
	}
?>

 

</body>
</html>