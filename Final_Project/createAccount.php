<?php
$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "bac85967e1905a";
$password = "1f5c1b57";
$dbname = "heroku_b451a5033689d3c"; 

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


    if (isset($_POST["signUpButton"])) {
        if ($_POST["bool"] == "0") {
            $username = $_POST["username"];
            $password = $_POST["password"];
        
            $sql = "INSERT INTO siteuser
                        (username, password, credits)
                    VALUES
                        ('$username','$password','50')";
                        
            $conn->query($sql);
            echo "<h1>Account created successfully.<h1>";
            
        }
        else {
            echo "Account cannot be created, please fix any described errors.";
        }
    }
    
    if (isset($_POST["backButton"])) {
        header("Location: userSection.php");
    }
?>
<html>
    <head>
        <title>Account creation</title>
        <h1>Create User Account</h1>

        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script>
            function validateUsername() {
                
                $.ajax({
                    type: "get",
                    url: "https://cst336-jasonkirn.c9users.io/cst336/Final_Project/usernameApi.php",
                    dataType: "json",
                    data: {
                        'username': $('#username').val()
                    },
                    success: function(data,status) {
    
                        if (data == null) {
                            $('#username-valid').html("Username is available");
                            $('#username').css("background", "#d3f8d3");
                            $('#bool').val("0");
                            console.log($('#bool').val());
                        } else {
                            $('#username-valid').html("Username is not available");
                            $('#username').css("background", "#ff9999");
                            $('#bool').val("1");
                            console.log($('#bool').val());
                        }
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                        //alert(data);
                    }
                });
            }
            function samePassword() {
                //This works, but we're doing click sign up method as well to experiment
                if ($('#retyped-password').val() != $('#password').val()) {
                    $('#incorrect-pass').html("Retyped password does not currently match original password, please change retyped password");
                    $('#retyped-password').css("background", "#ff9999");
                    $('#bool').val("1");
                    console.log($('#bool').val());
                }
                else {
                    $('#incorrect-pass').html("");
                    $('#retyped-password').css("background", "#d3f8d3");
                    $('#bool').val("0");
                    console.log($('#bool').val());
                }
            }
        </script>
    </head>
    <body>
        <form method="POST">
            Username:<input onchange="validateUsername();" id="username" name="username" type="text"><span id="username-valid"></span>
            <br />
            Password:<input type="password" id="password" name="password"/>
            <br />
            Confirm password:<input onchange="samePassword();" id='retyped-password' type="password"> <span id="incorrect-pass"></span>
            <br />
            <!-- hidden used to make a bool that checks if user account is allowed to be created -->
            <input type="hidden" name="bool" id="bool" value="0">
            <input type="submit" name="signUpButton" value="Sign up">
            <input type="submit" name="backButton" value="Back">
        </form>
    </body>
</html>