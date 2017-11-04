<?php

  $servername = "us-cdbr-iron-east-05.cleardb.net";
  $username = "bac85967e1905a";
  $password = "1f5c1b57";
  $dbname = "heroku_b451a5033689d3c"; 
  
  //Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  function getUserInfo() {
    global $conn;
    
    $sql = "SELECT * 
            FROM user
            WHERE id = " . $_GET['userId']; 
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();

        return $record;
    }   
  }
  
  
  if (isset($_GET['Yes'])) {
    $id = $_GET['userId'];
    
    $sql = "DELETE FROM user 
            WHERE id = '$id'"; 

    $result = $conn->query($sql);
  
    header("Location: admin.php");
  }
  
  if (isset($_GET['No'])) {
    header("Location: admin.php");
  }

  if (isset($_GET['userId'])) {
    $userInfo = getUserInfo();
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <h1>Are you sure you want to delete this user?</h1>
    <style>
            @import url("./css/styles.css");
    </style>
  </head>
  <body>
    <form method="GET">
      <input type="hidden" name="userId" value="<?=$userInfo['id']?>" />
      <input type="submit" id="decision" value="Yes" name="Yes" />
      <input type="submit" id="decision" value="No" name="No" />
    </form>
  </body>
</html>