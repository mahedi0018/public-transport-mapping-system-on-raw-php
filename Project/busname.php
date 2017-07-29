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
		color: blue;
		-webkit-transition: width 0.4s ease-in-out;
		transition: width 0.4s ease-in-out;
		font-size: 25px;
	}
	 
	 
   </style>
<body>
<h1>BUS STOPPAGE</h1>
<?php
	$localhost = "localhost";
	$username = "root";
	$password = "";
	$db_name = "project";
	$tbl_name="place"; // Table name 

	mysql_connect("$localhost", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB"); 
	$bus_name = $_POST["bus_name"];

	$bus_name = stripslashes($bus_name);
	$bus_name = mysql_real_escape_string($bus_name);

	$sql = "SELECT * FROM stoppage WHERE bus_name='$bus_name'";
		//WHERE bus_name IN ($bus_name)";
	
	$result=mysql_query($sql);
	/*if ($result==false)
		{
			die(mysql_error());
		}
	$count=mysql_num_rows($result);*/
	$count=mysql_num_rows($result);
	echo $bus_name.'<br>';
	if($count>0){
		while($row = mysql_fetch_array($result))
		{	
			
			echo $row['id'].' : '.$row['place']. '<br>';
		} 
	
	} else {
		echo "0 results";
	  }
	  
?>  
	<a href = "logout.php" tite = "Logout">Logout</a><br>
</body>
</html>

