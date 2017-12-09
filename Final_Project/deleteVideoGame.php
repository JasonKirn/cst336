<?php

  $servername = "us-cdbr-iron-east-05.cleardb.net";
  $username = "bac85967e1905a";
  $password = "1f5c1b57";
  $dbname = "heroku_b451a5033689d3c"; 
  
  //Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  function getVideoGameInfo() {
    global $conn;
    
    $sql = "SELECT * 
            FROM video_game
            WHERE video_game_id = " . $_GET['video_game_id']; 
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();

        return $record;
    }   
  }
  
  
  if (isset($_GET['Yes'])) {
    $id = $_GET['videoGameId'];
    
    $sql = "DELETE FROM video_game 
            WHERE video_game_id = '$id'"; 

    $result = $conn->query($sql);
  
    header("Location: admin.php");
  }
  
  if (isset($_GET['No'])) {
    header("Location: admin.php");
  }

  if (isset($_GET['video_game_id'])) {
    $videoGameInfo = getVideoGameInfo();
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Delete game</title>
    <h1>Are you sure you want to delete this video game?</h1>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <form method="GET">
      <input type="hidden" name="videoGameId" value="<?=$videoGameInfo['video_game_id']?>" />
      <input type="submit" id="decision" value="Yes" name="Yes" />
      <input type="submit" id="decision" value="No" name="No" />
    </form>
  </body>
</html>