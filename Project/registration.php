<!DOCTYPE html>
<html>
<head>

<style>

	 body{
	    background: url(registration.jpg);
		
	 }
	 
      h1{
	                         
		color: beige;
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
		color: beige;
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

<title>REGISTRATION PAGE FOR USER</title>
</head>
<body>
<h1>REGISTRATION</h1>
<?php

$Registration = $_POST["Registration"];

?>

<form action="registration1.php" method="post">
<p>UserName:</p> <input type="text" name="username"><br>
<p>Password: </p><input type="password" name="password"><br>
<input type="submit" id="btn" value="REGISTRATION" >
</form>

</body>
</html>