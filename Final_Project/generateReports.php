<?php
session_start();

$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "bac85967e1905a";
$password = "1f5c1b57";
$dbname = "heroku_b451a5033689d3c"; 

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<span class='report_text'>";
echo "Count of video games in database:<br>";

$sql = "SELECT COUNT(*) 
        FROM video_game";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($records = $result->fetch_assoc()) {
        echo $records["COUNT(*)"];
    }
}   

echo "<br><br>Count of users in database that are not admins:<br>";

$sql = "SELECT COUNT(*)
        FROM siteuser";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($records = $result->fetch_assoc()) {
        echo $records["COUNT(*)"];
    }
}

echo "<br><br>Average amount of credits between users:<br>";

$sql = "SELECT AVG(credits) 
        FROM siteuser";
        
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($records = $result->fetch_assoc()) {
        echo $records["AVG(credits)"];
    }
}
echo "</span>";

if (isset($_GET["backButton"])) {
    header("Location: admin.php");
}

?>

<html>
    <head>
        <title>Reports</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form>
            <input type="submit" name="backButton" value="Back">
        </form>
    </body>
</html>
