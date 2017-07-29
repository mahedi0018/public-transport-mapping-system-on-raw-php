<?php
session_start();
if(isset($_SESSION[' '])){

}

?>

<!DOCTYPE html>
<html>
<head>
<title>LOGIN PAGE</title>
</head>
<style>
    
	 body{
	    
		background: aquamarine;
		background-size: 100% auto;
		
	 }
	 
	 h1 {
		color: darkviolet;
		text-align: center;
		display: block;
		font-size: 3.5em;
		margin-top: 0.67em;
		margin-bottom: 0.67em;
		margin-left: 0;
		margin-right: 0;
		font-weight: bold;
		}
	 .button {
		background-color: #4CAF50; /* Green */
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 12px;
		cursor: pointer;
		float: left;
	}

	.button:hover {
		background-color: #3e8e41;
	}
		
	a {
		text-decoration: none;
		color: sienna;
		-webkit-transition: width 0.4s ease-in-out;
		transition: width 0.4s ease-in-out;
		font-size: 40px;
	}
</style>	 

<body>
<h1>Welcome To Public Transport Mapping System</h1>
<form action="login.php" method="post">
<input class="button" type="submit" id="btn" value="LOGIN" name="login" >
</form>


<form action="registration.php" method="post">
<input class="button" type="submit" id="btn" value="REGISTRATION" name="Registration" >

</form>

<form action="admin.php" method="post">
<input class="button" type="submit" id="btn" value="ADMIN" name="admin" >

</form>
<a href = "direction.php" tite = "Direction">Direction</a><br>

</body>
</html>