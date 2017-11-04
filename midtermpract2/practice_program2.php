<?php

//include '../includes/dbConn.php';
//$dbConn = getConnection("midterm");

//$servername = "us-cdbr-iron-east-05.cleardb.net";
$servername = "localhost";
$username = "jasonkirn";
$password = "";
$dbname = "midterm_pract"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Report 1: Towns with population between 50K and 80K: <br/ >";
$sql = "SELECT town_name, population FROM mp_town WHERE population BETWEEN 50000 AND 80000";

		
$stmt = $conn->query($sql);	
if ($stmt->num_rows > 0) {
    // output data of each row
    while($row = $stmt->fetch_assoc()) {
        echo $row['town_name'] . " - " . $row['population'] . "<br />";
    }
}   
else {
    echo "0 results after search";
}



echo "Report 2: Towns with County Names: <br/ >";
$sql = "SELECT town_name, county_name FROM mp_town JOIN mp_county ON 
    mp_town.county_id = mp_county.county_id";

$stmt = $conn->query($sql);	
if ($stmt->num_rows > 0) {
    // output data of each row
    while($row = $stmt->fetch_assoc()) {
	    echo $row['town_name']  . " - " . $row['county_name'] .  "<br />";
    }
}
else {
    echo "0 results after search";
}



echo "<br />Report 3:Population by County: <br/ >";
$sql = "SELECT county_name, SUM(population) total FROM mp_town JOIN
    mp_county ON mp_town.county_id = mp_county.county_id GROUP BY county_name";

$stmt = $conn->query($sql);	
if ($stmt->num_rows > 0) {
    // output data of each row
    while($row = $stmt->fetch_assoc()) {
        echo $row['county_name']  . " - " . $row['total'] .  "<br />";
    }
}   
else {
    echo "0 results after search";
}

	

echo "<br />Report 4:Population by State: <br/ >";
$sql = "SELECT state_name, SUM(population) total FROM mp_town JOIN
    mp_county ON mp_town.county_id = mp_county.county_id JOIN mp_state ON
    mp_county.state_id = mp_state.state_id GROUP BY state_name";
		
$stmt = $conn->query($sql);	
if ($stmt->num_rows > 0) {
    // output data of each row
    while($row = $stmt->fetch_assoc()) {
        echo $row['state_name']  . " - " . $row['total'] .  "<br />";
    }
}   
else {
    echo "0 results after search";
}
	


echo "<br />Report 5:Three least populated cities: <br/ >";
$sql = "SELECT town_name, population FROM mp_town ORDER BY population LIMIT 3";
		
$stmt = $conn->query($sql);	
if ($stmt->num_rows > 0) {
    // output data of each row
    while($row = $stmt->fetch_assoc()) {
        echo $row['town_name']  . " - " . $row['population'] .  "<br />";
    }
}   
else {
    echo "0 results after search";
}



echo "<br />Report 6:Counties without a town: <br/ >";
$sql = "SELECT county_name FROM mp_county LEFT JOIN mp_town ON mp_county.county_id
    = mp_town.county_id WHERE mp_town.county_id IS NULL";
    
$stmt = $conn->query($sql);
if ($stmt->num_rows > 0) {
    // output data of each row
    while($row = $stmt->fetch_assoc()) {
        echo $row['county_name']  .  "<br />";
    }
}   
else {
    echo "0 results after search";
}

?>