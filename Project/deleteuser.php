<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "project";
$tbl_name="login"; // Table name 

$conn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// username and password sent from form 
$id = $_GET["id"];



// To protect MySQL injection
$id = stripslashes($id);
$id = mysql_real_escape_string($id);


// sql to delete a record
$sql = "DELETE FROM $tbl_name WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
<html>
<body>

 <a href = "logout.php" tite = "Logout">Logout
</body>
</html>