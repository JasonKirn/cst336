<?php

$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "bac85967e1905a";
$password = "1f5c1b57";
$dbname = "heroku_b451a5033689d3c"; 

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

function getVideoGameInfo() {
    global $conn;
    
    $value = $_GET['video_game_id'];
    
    $sql = "SELECT * 
            FROM video_game
            WHERE video_game_id = '$value'"; 

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();
        return $record;
    }   
    else {
        echo "Something is wrong";
    }
}


if (isset($_GET['updateGame'])) { //checks whether admin has submitted form.
     
    $video_game_name = $_GET['video_game_name'];
    $video_game_price = $_GET['video_game_price'];
    $release_year = $_GET['release_year'];
    $id = $_GET['video_game_id'];
    
    $sql = "UPDATE video_game
            SET video_game_name = '$video_game_name',
                video_game_price  = '$video_game_price',
                release_year = '$release_year'
            WHERE video_game_id = $id";

    $conn->query($sql);
    echo "<span class='eventText'>";
    echo "Record has been updated!";
    echo "</span>";
     
}


if (isset($_GET['video_game_id'])) {
    $videoGameInfo = getVideoGameInfo();
}

if (isset($_GET['backButton'])) {
    header("Location: admin.php");
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Update Video Game </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <h1> Tech Checkout System: Updating User's Info </h1>
        <form method="GET">
            <input type="hidden" name="video_game_id" value="<?=$videoGameInfo['video_game_id']?>" />
            Video Game Name:<input type="text" name="video_game_name" value="<?=$videoGameInfo['video_game_name']?>" />
            <br />
            Video Game Price:<input type="text" name="video_game_price" value="<?=$videoGameInfo['video_game_price']?>"/>
            <br/>
            Release Year:<input type="text" name="release_year" value="<?=$videoGameInfo['release_year']?>"/>
            <br/>
            <input type="submit" id="updateButton" value="Update Game" name="updateGame">
            <input type="submit" name="backButton" value="Back">
        </form>

    </body>
</html>