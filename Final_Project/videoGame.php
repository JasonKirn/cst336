<?php
session_start();
function search() {
$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "bac85967e1905a";
$password = "1f5c1b57";
$dbname = "heroku_b451a5033689d3c"; 
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT *
            FROM video_game
            WHERE 1";
if(isset($_GET["backButton"])) {
    header("Location: userSection.php");
}
if(isset($_GET["submitButton"])) {
    $video_game_name = $_GET["video_game_name"];
    $video_game_price = $_GET["video_game_price"];
    $release_year = $_GET["video_game_release_year"];
            
    if (isset($_GET["filter_by_name_radio"])) {
        $sql = $sql . " AND video_game_name = '$video_game_name'";
        if ($video_game_name == "") {
            echo "<br>Please enter a video game name<br>";
        }
    }
    if (isset($_GET["filter_by_price_radio"])) {
        $sql = $sql . " AND video_game_price = '$video_game_price'";
        if ($video_game_price == "") {
            echo "<br>Please enter a video game price to search<br>";
        }
    }
    if (isset($_GET["filter_by_release_year_radio"])) {
        $sql = $sql . " AND release_year = '$release_year'";
        if ($release_year == "") {
            echo "<br>Please enter a release year to search<br>";
        }
    }
    if (isset($_GET["sort_by_option"])) {
        $value = $_GET["sort_by_option"];
        if ($value != "") {
            $sql = $sql . " ORDER BY $value";
        }
    }
    if (isset($_GET["order_radio"])) {
        $value = $_GET["order_radio"];
        if ($_GET["order_radio"] == "descending") {
            $sql = $sql . " desc";
        }
    }
}
$result = $conn->query($sql);
    
echo "<table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Year</th>
        </tr>";
        
if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["video_game_name"]. "</td><td>".$row["video_game_price"]. "</td><td> ".$row["release_year"] ."</td><td>";
    }
}
echo "</table>";
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Video Games</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <h1 id="vgames">Video Games</h1>
    </head>
    <body>
        <form id="vgames">
            <fieldset id="filter_by_name">
                Filter by Name:
                <input type="Radio" name="filter_by_name_radio" value="name">
                Name:
                <input type="text" name="video_game_name">
            </fieldset>
            <fieldset id="filter_by_price">
                Filter by Price:
                <input type="Radio" name="filter_by_price_radio" value="price">
                Price (please include $ before price):
                <input type="text" name="video_game_price">
            </fieldset>
            <fieldset id="filter_by_release_year">
                Filter by Release Year:
                <input type="Radio" name="filter_by_release_year_radio" value="release_year">
                Release Year:
                <input type="text" name="video_game_release_year">
            </fieldset>
            <fieldset id="sort_field">
                Order results by:
                <select name="sort_by_option">
                    <option value="">Select...</option>
                    <option value="video_game_name">Name</option>
                    <option value="video_game_price">Price</option>
                    <option value="release_year">Release Year</option>
                </select>
                <input type="Radio" name="order_radio" value="ascending">Ascending
                <input type="Radio" name="order_radio" value="descending">Descending
            </fieldset>
            <fieldset id="submitButton">
                <input type="submit" id="submit" name="submitButton" value="Filter" />
                <input type="submit" id="back" name="backButton" value="Back" />
            </fieldset>
        </form>
        <?php 
            search();
        ?>
    </body>
</html>