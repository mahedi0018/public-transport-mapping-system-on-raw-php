<!DOCTYPE html>
<html>

<style>

	 body{
	    background: tan;
	 }
	 
      h1{
	                         
		color: firebrick;
		text-align: center;
		word-spacing: 10px;
		
	 }
	 
	 
	 
	 input[type="text"],[type="date"],[type="email"],[type="password"]{
        width:200px;
      
		
        font-size: 15px;
        		
      }
	  
	  input[type=submit] {
		width: 20%;
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		border-radius: 4px;
		cursor: pointer;
		}
		
		input[type=text] {
		-webkit-transition: width 0.4s ease-in-out;
		transition: width 0.4s ease-in-out;
		}

	 input[type=text]:focus {
		width: 20%;
		}
	 div {
    
	  }
    p{
	    font-size: 24px;                   
		color: violet;
		line-height: 0.8;
		word-spacing: 10px;
		
	 }
	 a {
		text-decoration: none;
		color: green;
		-webkit-transition: width 0.4s ease-in-out;
		transition: width 0.4s ease-in-out;
		font-size: 25px;
	}
	 
	 
   </style>

<body>

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
$username = $_POST["username"];
$password = $_POST["password"];

// To protect MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);


$sql = "INSERT INTO $tbl_name (username, password)
VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<br>
 <a href = "logout.php" tite = "Logout">Logout
</body>
</html>