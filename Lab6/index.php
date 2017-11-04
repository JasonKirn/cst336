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

$username = $_POST['username'];
$password = sha1($_POST['password']);
    
$sql = "SELECT * 
        FROM admin 
        WHERE userName = '$username' 
        AND password = '$password' ";

//user :username and :password plus code below        
//prevents sql injection

//also see lara's code to see other setups for this safe format https://ide.c9.io/divegamaravilla/cst336-sql2
//$namedParameters = array();
//$namedParameters[':username'] = $username;
//$namedParameters[':password'] = $password;

$result = $conn->query($sql);

//validates the username and password
if (isset($_POST["submitButton"])) {

   
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["firstName"]. " ".$row["lastName"]."<br>";
                echo "Login successful";
                
                $_SESSION['userName'] = $row['userName'];
                $_SESSION['adminName'] = $row['firstName'] . " " . $row['lastName'];
                
                header("Location: admin.php");
            }
        }   
        else {
            echo "<span class='wrongLoginText'>";
            echo "Wrong credentials";
            echo "</span>";
        }
}

//Safe teacher variation
/*
function loginProcess() {

    if (isset($_POST['loginForm'])) {  //checks if form has been submitted
    
        include '../../database.php';
        $conn = getDatabaseConnection();
      
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            
            $sql = "SELECT *
                    FROM Admin
                    WHERE username = :username 
                    AND   password = :password ";
            
            $namedParameters = array();
            $namedParameters[':username'] = $username;
            $namedParameters[':password'] = $password;

            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $record = $stmt->fetch();
            
            if (empty($record)) {
                
                echo "Wrong Username or password";
                
            } else {
                
               $_SESSION['userName'] = $record['userName'];
               $_SESSION['adminName'] = $record['firstName'] . "  " . $record['lastName'];
               //echo $record['firstName'];
               header("Location: admin.php"); //redirecting to admin.php
                
            }
           // print_r($record);
    }
}
*/
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login</title>
        <style>
            @import url("./css/styles.css");
        </style>
    </head>
    <body>
        <h1> Admin Login</h1>
        
        <form method="POST">
    
        Username: <input type="text" name="username"/> <br />
        Password: <input type="password" name="password"/> <br />
        <fieldset id="submitButton">
            <input type="submit" id="submit" value="Submit" name="submitButton" />
        </fieldset>
            
        </form>
        
        <br />

        
    </body>
    <footer>
       Jason Kirn        
    </footer>
</html>