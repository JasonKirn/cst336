<?php


    $servername = "us-cdbr-iron-east-05.cleardb.net";
    $username = "bac85967e1905a";
    $password = "1f5c1b57";
    $dbname = "heroku_b451a5033689d3c"; 
    
    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //For username validation
    $username = $_GET['username'];
    $sql = "SELECT *
            FROM user
            WHERE username='$username'";
            
    $result = $conn->query($sql);

    //but, if nothing is found, we are not translating to json, that's the first error
    //if ($result->num_rows > 0) {

            $records = $result->fetch_assoc();
            echo json_encode($records);
            //echo "f";

    /*}   
    else {
        echo json_encode($records);
    }*/
?>