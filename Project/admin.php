<!DOCTYPE html>
<html>

<style>

	 body{
	    background: url(admin.jpg);
		background-size: 100%; 
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
		color: orange;
		-webkit-transition: width 0.4s ease-in-out;
		transition: width 0.4s ease-in-out;
		font-size: 25px;
	}
	 
	 
   </style>
<head>
<title>LOGIN PAGE FOR ADMIN</title>
</head>
<body>

<?php

$admin = $_POST["admin"];

?>
<h1>LOGIN PAGE FOR ADMIN</h1>
<form action="admin1.php" method="post">
<p>AdminName: </p><input type="text" name="adminname"><br>
<p>Password: </p><input type="password" name="password"><br>
<input type="submit" id="btn" value="ADMIN LOGIN" >
</form>

</body>
</html>