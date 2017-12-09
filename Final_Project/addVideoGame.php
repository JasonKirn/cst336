<?php
$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "bac85967e1905a";
$password = "1f5c1b57";
$dbname = "heroku_b451a5033689d3c"; 

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Use AJAX to warn if video game name already exists before adding to database
if (isset($_POST['addVideoGame'])) { //the add form has been submitted
    
    $videoGameName = $_POST['videoGameName'];
    $videoGamePrice = $_POST['videoGamePrice'];
    $releaseYear = $_POST['releaseYear'];
    
    $sql = "INSERT INTO video_game
                (video_game_name, video_game_price, release_year)
            VALUES
                ('$videoGameName', '$videoGamePrice', '$releaseYear')";
    
    $conn->query($sql);
    echo "<span class='eventText'>";
    echo "Video Game Added";
    echo "</span>";
}

if (isset($_POST['backButton'])) {
    header("Location: admin.php");
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin: Add new video game</title>

        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <script>
            function checkExistingGames() {
                $.ajax({
                    type: "get",
                    url: "https://cst336-jasonkirn.c9users.io/cst336/Final_Project/api.php",
                    dataType: "json",
                    data: {
                        'video_game_name': $('#video_game_name').val()
                    },
                    success: function(data,status) {
                        
                        if (data == null) {
                            $('#non_existing_name').html("Current name not already found in database");
                            $("#video_game_name").css("background", "#d3f8d3");
                        } else {
                            $('#non_existing_name').html("Warning: Video game title already in database");
                            $('#video_game_name').css("background", "#FFFF99");
                        }
                    }
                })
            }
        </script>
    </head>
    <body>
        
        <h1> Adding New Video Game </h1>

        <form method="POST">
            Video Game Name:<input onchange="checkExistingGames();" id='video_game_name' name="videoGameName" type="text"> <span id="non_existing_name"></span>
            <br />
            Video Game Price:<input type="text" name="videoGamePrice"/>
            <br/>
            Release Year:<input type= "text" name ="releaseYear"/>
            <br/>

            <input type="submit" id="addVideoGameButton" value="Add Video Game" name="addVideoGame">
            <input type="submit" value="Back" name="backButton">
        </form>
    </body>
</html>