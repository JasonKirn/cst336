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
        // output data of each row
        $record = $result->fetch_assoc();
        return $record;
        
    }   
    else {
        echo "<br>WRONG CREDENTIALS";
    }
}


 if (isset($_GET['updateUser'])) { //checks whether admin has submitted form.
     
     $firstName = $_GET['firstName'];
     $lastName = $_GET['lastName'];
     $id = $_GET['userId'];
     
     $sql = "UPDATE user
             SET firstName = '$firstName',
                 lastName  = '$lastName'
             WHERE id = '$id'";

     $conn->query($sql);
     echo "<span class='eventText'>";
     echo "Record has been updated!";
     echo "</span>";
     
 }


 if (isset($_GET['userId'])) {
    $userInfo = getUserInfo();
 }



?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update User </title>
        <style>
            @import url("./css/styles.css");
        </style>
    </head>
    <body>

        <h1> Tech Checkout System: Updating User's Info </h1>
        <form method="GET">
            <input type="hidden" name="userId" value="<?=$userInfo['id']?>" />
            First Name:<input type="text" name="firstName" value="<?=$userInfo['firstName']?>" />
            <br />
            Last Name:<input type="text" name="lastName" value="<?=$userInfo['lastName']?>"/>
            <br/>
            Email: <input type= "email" name ="email" value="<?=$userInfo['email']?>"/>
            <br/>
            Phone Number: <input type ="text" name= "phone" value="<?=$userInfo['phone']?>"/>
            <br />
           Role: 
           <select name="role">
                <option value=""> - Select One - </option>
                <option value="staff"  <?=($userInfo['role']=='Staff')?" selected":"" ?>  >Staff</option>
                <option value="student" <?=($userInfo['role']=='Student')?" selected":"" ?>  >Student</option>
                <option value="faculty" <?=($userInfo['role']=='Faculty')?" selected":"" ?>>Faculty</option>
            </select>
            <br />
            Department: 
            <select name="deptId">
                <option value="" > Select One </option>
            </select>
            <input type="submit" id="updateButton" value="Update User" name="updateUser">
        </form>

    </body>
</html>