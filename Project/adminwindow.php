<?php

session_start();
if(isset($_SESSION['adminname'])){
}
else {
	//echo "wrong password";
	header("location: admin.php");
}
?>
<!DOCTYPE html>
<html>

<style>
    
	 
	 body{
	    background: darkgray;
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
	 ul {
		list-style-type: none;
		margin: ;
		padding: 0;
		overflow: hidden;
		background-color: navy;
		position: fixed;
		top: 0;
		width: 100%;
	}

	li {
		float: left;
	}

	li a {
		display: block;
		color: white;
		text-align: center;
		padding: 16px 16px;
		text-decoration: none;
	}

	li a:hover:not(.active) {
		background-color: black;
	}

	.active {
		background-color: water;
	}
	 
	 
</style>
<body>



<html>
<ul>

	<li><a href = "userlist.php" tite = "ulist">User List</a></li>
	<li><a href = "direction.php" tite = "Dir">Direction</a></li>
	<li><a href = "addnode.php" tite = "Add Node">Add Node</a></li>
	<li><a href = "addmap.php" tite = "Add Location">Add Location</a><br></li>
	<li><a href = "addbus.php" tite = "Add Bus">Add Bus</a><br></li>
	<li><a href = "addstoppage.php" tite = "Add Stoppage">Add Stoppage</a><br></li>
	<li><a href = "logout.php" tite = "Logout">Logout</a></li>
	<li style="float:right; color:white; margin-top:15px; margin-right:20px;">Welcome, <?php echo $_SESSION['adminname']; ?></li>
</ul>

</body>
</html>