<?php

include_once('db.php');
global $counta;
$counta=0;

	global $direction,$direction_no,$ways,$found,$found_no;
	$direction=array();
	$ways=0;
	$direction_no=array();
	$found=array();
	$found_no=0;
if(isset($_POST['submit'])) {
	$from=$_POST['node1'];
	$to=$_POST['node2'];
	
	$nodes=array();
	
	$sql="SELECT * FROM map";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			$sql1="SELECT * FROM map";
			$result1=mysql_query($sql1);
			while($row1 = mysql_fetch_array($result1))
			{
				$nodes[$row['location']][$row1['location']]=0;
			}
		} 
	}
	
	
	
	$sql="SELECT * FROM node";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			$nodes[$row['node1']][$row['node2']]=1;
			$nodes[$row['node2']][$row['node1']]=1;
		} 
	}
	
	$direction_no[$ways]=0;
	$direction[$ways][$direction_no[$ways]]=$from;
	$direction_no[$ways]++;
	$ways++;
	$found[$found_no]=$from;
	$found_no++;
	function direction_func($prev, $currrent_node, $nodes, $from, $to) {
		global $direction,$direction_no,$ways,$found,$found_no;
		foreach($nodes[$currrent_node] as $key=>$value) {
			if($nodes[$currrent_node][$key]==1) {
				
				if($key==$from || $key==$prev) continue;
				if($key==$to) {
					$direction[$ways-1][$direction_no[$ways-1]]=$key;
					$direction[$ways]=$direction[$ways-1];
					$direction_no[$ways]=$direction_no[$ways-1];
					$direction_no[$ways-1]++;
					//$direction_no++;
					$ways++;
				}
				else {
					$revealed=0;
					for($k=0; $k<$found_no; $k++) {
						if($found[$k]==$key) $revealed=1;
					}
					if($revealed==0) {
						$direction[$ways-1][$direction_no[$ways-1]]=$key;
						$direction_no[$ways-1]++;
						$found[$found_no]=$key;
						$found_no++;
						$ret=direction_func($currrent_node, $key, $nodes, $from, $to);

							if($found_no>1) $found_no--;
							if($direction_no[$ways-1]>1) $direction_no[$ways-1]--;
						
					}
					else {
						
					}
				}
			}
		}
		return 0;
	}
	direction_func($from, $from, $nodes, $from, $to); 
}

?>
<!DOCTYPE html>
<html>
<head>



    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 70%;
        height: 100%;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
      }
    </style>

<style>

	 body{
	   
		background: antiquewhite;
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
		width: 94px;
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

<title>Direction</title>
</head>
<body>
<table>
<?php
for($j=0; $j<$ways-1; $j++) {
	$places_php="";
	echo '<tr>';
	for($i=0; $i<$direction_no[$j]; $i++) {
		echo'<td style="border:1px solid black;">'.$direction[$j][$i].'</td>';
		$places_php=$places_php.$direction[$j][$i].',';
	}
	echo '<td>
	<button onclick="change_direction(\''.$places_php.'\')">Select Path</button>
	</td>';
	echo '</tr>';
	echo '<tr>';
	// bus
	for($i=0; $i<sizeof($direction[$j]); $i++) {
		echo '<td style="border:1px solid black;">';
		$place=$direction[$j][$i];
		$sql="SELECT * FROM stoppage WHERE place='$place'";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		if($count>0){
			while($row = mysql_fetch_array($result))
			{
				echo $row['bus_name'].'<br>';
			} 
		}
		echo '</td>';
		if($direction[$j][$i]==$to) break;
	}
	echo '</tr>';
}
?>
</table>
<br>
<form action="" method="post">
<p>From : <select name="node1">
<?php
	$sql="SELECT * FROM map";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			echo '<option>'.$row['location'].'</option>';
		} 
	}
?>
</select>
To : <select name="node2">
<?php
	$sql="SELECT * FROM map";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0){
		while($row = mysql_fetch_array($result))
		{
			echo '<option>'.$row['location'].'</option>';
		} 
	}
?>
</select>
</p>
<p><input type="submit" name="submit" value="Search"></p><br>
</form>
<a href = "logout.php" title= "Logout">Logout</a>






<script>
function change_direction(places) {
	document.getElementById('waypoints').innerHTML="";
	var res = places.split(",");
	for(var i=0; i<res.length-1; i++) {
		if(i==0) {
			document.getElementById('start').innerHTML='<option value="'+res[i]+', Dhaka">'+res[i]+'</option>';
		}
		else if(i==res.length-2) {
			document.getElementById('end').innerHTML='<option value="'+res[i]+', Dhaka">'+res[i]+'</option>';
		}
		else {
			document.getElementById('waypoints').innerHTML=document.getElementById('waypoints').innerHTML+'<option value="'+res[i]+', Dhaka">'+res[i]+'</option>';
		}
	}
}
</script>



<div id="map"></div>
    <div id="right-panel">
    <div>
    <b>Start:</b>
    <select id="start">
      <option value="Halifax, NS">Halifax, NS</option>
      <option value="Boston, MA">Boston, MA</option>
      <option value="New York, NY">New York, NY</option>
      <option value="Miami, FL">Miami, FL</option>
    </select>
    <br>
    <b>Waypoints:</b> <br>
    <i>(Ctrl+Click or Cmd+Click for multiple selection)</i> <br>
    <select id="waypoints" multiple>
      <option value="montreal, quebec">Montreal, QBC</option>
      <option value="toronto, ont">Toronto, ONT</option>
      <option value="chicago, il">Chicago</option>
      <option value="winnipeg, mb">Winnipeg</option>
      <option value="fargo, nd">Fargo</option>
      <option value="calgary, ab">Calgary</option>
      <option value="spokane, wa">Spokane</option>
    </select>
    <br>
    <b>End:</b>
    <select id="end">
      <option value="Vancouver, BC">Vancouver, BC</option>
      <option value="Seattle, WA">Seattle, WA</option>
      <option value="San Francisco, CA">San Francisco, CA</option>
      <option value="Los Angeles, CA">Los Angeles, CA</option>
    </select>
    <br>
      <input type="submit" id="submit">
    </div>
    <div id="directions-panel"></div>
    </div>









 <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);

        document.getElementById('submit').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
          if (checkboxArray.options[i].selected) {
            waypts.push({
              location: checkboxArray[i].value,
              stopover: true
            });
          }
        }

        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            }
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCunUcubzP2VJKYqR5ebEw7dkqeSlplnJE&callback=initMap">
    </script>
</body>
</html>