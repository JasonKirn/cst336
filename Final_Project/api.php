<?php


    $servername = "us-cdbr-iron-east-05.cleardb.net";
    $username = "bac85967e1905a";
    $password = "1f5c1b57";
    $dbname = "heroku_b451a5033689d3c"; 
    
    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //For username validation
    $video_game_name = $_GET['video_game_name'];
    $sql = "SELECT *
            FROM video_game
            WHERE video_game_name='$video_game_name'";
            
    $result = $conn->query($sql);

    $records = $result->fetch_assoc();
    echo json_encode($records);
?>