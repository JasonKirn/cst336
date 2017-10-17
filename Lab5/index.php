<?php
echo "<h1>School Device database</h1>";
$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "bac85967e1905a";
$password = "1f5c1b57";
$dbname = "heroku_b451a5033689d3c"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$filter = $_GET["filters"];
$sort = $_GET["sort"];
$typed = $_GET["textBox"];

//Note:  Copy SQL query from myPhpAdmin first for proper formatting on "'" in FROM, otherwise
//it won't work.
$sql1 = "SELECT * FROM `device` ORDER BY deviceName";

$sqlStatement = "SELECT * FROM `device` WHERE $filter = '$typed' ORDER BY $sort";

if (isset($_GET["submitButton"])) {
    if ((!isset($_GET["filters"])) || (!isset($_GET["sort"]))) {
        echo "Please select a filter or sort";
    }
    else if (!isset($_GET["textBox"])) {
        echo "Please search something";
    }
    else {
        
        $result = $conn->query($sqlStatement);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo "user id: ".$row["id"] . ": ".$row["firstName"]. " ".$row["lastName"]."<br>";
                echo $row["deviceName"];
                echo "-";
                echo $row["deviceType"];
                echo "-";
                echo $row["price"];
                echo "$-";
                echo $row["status"];
                echo "<br>";
            }
        }   
        else {
            echo "0 results after search";
        }
    }

    echo "<br>";

    if (!empty($_GET["textBox"])){
        $typed = $_GET["textBox"];
        echo "<span class='searchInformationText'>";
        echo "You searched:";
        echo $typed;
    }

    $filterValue = $_GET["filters"];
    $sortValue = $_GET["sort"];
    echo "<br>";
    echo "Filter value:";
    echo $filterValue;
    echo "<br>";
    echo "Sort value:";
    echo $sortValue;
    echo "</span>";
}
else {

    $result = $conn->query($sql1);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["deviceName"];
            echo "-";
            echo $row["deviceType"];
            echo "-";
            echo $row["price"];
            echo "$-";
            echo $row["status"];
            echo "<br>";
        }
    }   
    else {
        echo "0 results";
    }
}
$conn->close();

?>
<html>
    <head>
        <style>
            @import url("./css/styles.css");
        </style>
    </head>
    <body>

    <form>
        <fieldset id="filters">
            Filter by:<br>
            <input type="Radio" name="filters" value="deviceType">Device Type<br>
            <input type="Radio" name="filters" value="deviceName">Device Name<br>
            <input type="Radio" name="filters" value="status">Availability<br>
        </fieldset>
        <fieldset id="sort">
            Sort by:<br>
            <input type="Radio" name="sort" value="deviceName">Name<br>
            <input type="Radio" name="sort" value="price">Price<br>
        </fieldset>
        <input type="text" name="textBox">
        <fieldset id="submitButton">
            <input type="submit" id="submit" name="submitButton" value="Submit" />
        </fieldset>
    </form>        
    </body>
</html>

