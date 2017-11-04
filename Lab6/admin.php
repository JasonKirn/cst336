<?php
session_start();

if (!isset($_SESSION['userName'])) {
    header("Location: index.php");
}

function userList() {
    $servername = "us-cdbr-iron-east-05.cleardb.net";
    $username = "bac85967e1905a";
    $password = "1f5c1b57";
    $dbname = "heroku_b451a5033689d3c"; 
    
    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    $sql = "SELECT *
            FROM User
            Order By firstName";
    
    $result = $conn->query($sql);
    //$records = $result->fetchAll();//have to do fetch_assoc
    if ($result->num_rows > 0) {
            // output data of each row
            while($records = $result->fetch_assoc()) {
                echo $records["id"] . " " . $records["firstName"] . " ". $records["lastName"];
                echo "[<a href='updateUser.php?userId=".$records['id']."'> Update </a>] ";
                echo "[<a href='deleteUser.php?userId=".$records['id']."'> Delete </a>] ";
                echo "<br>";
            }
        }   
        else {
            echo "WRONG CREDENTIALS";
        }
    return $records;
        
}
/*
session_start();

if (!isset($_SESSION['username'])) {  //checks whether the admin is logged in
    header("Location: index.php");
}

function userList(){
  include '../../database.php';
  $conn = getDatabaseConnection();
  
  $sql = "SELECT *
          FROM User";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
  //print_r($records);
  return $records;
    
}
*/
?>
<html>
    <head>
        <title>Admin Main Page </title>
        <style>
            @import url("./css/styles.css");
        </style>
    </head>
    <body>

            <h1> Admin Main </h1>
            <h2> Welcome <?=$_SESSION['adminName']?>! </h2>
            
            <form action="addUser.php">
                
                <input type="submit" id="mainPageButtons" value="Add new user" />
                
            </form>
            
            <form action="logout.php">
                
                <input type="submit" id="mainPageButtons" value="Logout!" />
                
            </form>
            
            <br />
            
            <?php
            
             $users = userList();
             
             ?>
    </body>
</html>