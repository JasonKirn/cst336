<?php
//Sessions used to store items in shopping cart and allow user to see
//shopping cart contents
session_start();
                            
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
if (isset($_GET["submitButton"])) {
    header("Location: videoGame.php");
}

if (isset($_GET["createAccountButton"])) {
    header("Location: createAccount.php");
}

if (isset($_GET["loginButton"])) {
    header("Location: userLogin.php");
}

if (isset($_GET["backButton"])) {
    header("Location: index.php");
}
?>
<html>
    <head>
        <title>User Section</title>
        <h1>User Section</h1>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form>
            <br>
        <fieldset id="submitButton">
            <input type="submit" id="submit" name="submitButton" value="See Video Game Catalog" />
            <input type="submit" id="createAccount" name="createAccountButton" value="Create Account" />
            <input type="submit" id="login" name="loginButton" value="User Login" />
            <input type="submit" id="back" name="backButton" value="Back"/>
        </fieldset>
        </form>
    </body>
</html>