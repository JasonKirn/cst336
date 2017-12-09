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

$result = $conn->query($sql);

//validates the username and password
if (isset($_POST["submitButton"])) {

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $_SESSION['userName'] = $row['userName'];
                header("Location: admin.php");
            }
        }   
        else {
            echo "<span class='wrongLoginText'>";
            echo "Wrong credentials";
            echo "</span>";
        }
}
if (isset($_POST["backButton"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1> Admin Login</h1>
        <form method="POST">
        Username: <input type="text" name="username"/> <br />
        Password: <input type="password" name="password"/> <br />
        <fieldset id="submitButton">
            <input type="submit" id="submit" value="Login" name="submitButton" />
            <input type="submit" value="Back" name="backButton" />
        </fieldset>
        </form>
        <br />
    </body>
</html>