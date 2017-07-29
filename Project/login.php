<!DOCTYPE html>
<html>
<head>
<title>LOGIN PAGE</title>
</head>
  <style>

	 body{
	    background: url(loginwindow.jpg);
	 }
	 
     h1{
	                         
		color: aliceblue;
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
	                         
		color: violet;
		
		word-spacing: 10px;
		
	 }
	 
   </style>

<body>
<h1> LOGIN PAGE FOR USER</h1>
<?php
$login = $_POST["login"];
?>

<div>
<form action="1.php" method="post">
<p>User Name:</p> <input type="text" name="username"><br>
<p>Password:</p> <input type="password" name="password"><br>
<input type="submit" id="btn" value="LOGIN" >
</form>

</div>
</body>
</html>