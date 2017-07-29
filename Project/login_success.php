<?php
session_start();
if(isset($_SESSION['username'])){

}
else {
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<style>

	 body{
	    background: aqua;
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

<body>


<form action="busname.php" method="post">
<p> Bus Name : </p><input type="text" name="bus_name"><br>
<input type="submit" id="btn" value="Search For Place"><br>
</form>
 <a href = "direction.php" tite = "Direction">Direction</a><br>

 <a href = "logout.php" tite = "Logout">Logout</a><br>
</body>
</html>