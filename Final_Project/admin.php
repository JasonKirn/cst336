<?php
session_start();

if (!isset($_SESSION['userName'])) {
    header("Location: adminLogin.php");
}

function videoGameList() {
    $servername = "us-cdbr-iron-east-05.cleardb.net";
    $username = "bac85967e1905a";
    $password = "1f5c1b57";
    $dbname = "heroku_b451a5033689d3c"; 
    
    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    $sql = "SELECT *
            FROM video_game
            Order By video_game_id";
    
    $result = $conn->query($sql);
    
    echo "<table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Year</th>
            </tr>";
    
    if ($result->num_rows > 0) {
            // output data of each row
            while($records = $result->fetch_assoc()) {
                echo "<tr><td>" .$records["video_game_name"] . "</td><td> ". $records["video_game_price"] . "</td><td>" . $records["release_year"] . "</td><td>";
                echo "[<a href='updateVideoGame.php?video_game_id=".$records['video_game_id']."'> Update </a>]</td><td>";
                echo "[<a href='deleteVideoGame.php?video_game_id=".$records['video_game_id']."'> Delete </a>]</td><tr>";
            }
        }   
        else {
            echo "WRONG CREDENTIALS";
        }
    return $records;
        
}

?>
<html>
    <head>
        <title>Admin Main Page </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

            <h1> Admin Main </h1>
            <h2> Welcome <?=$_SESSION['userName']?>! </h2>
            
            <form action="addVideoGame.php">
                
                <input type="submit" id="mainPageButtons" value="Add new Video Game" />
                
            </form>
            
            <form action="logout.php">
                
                <input type="submit" id="mainPageButtons" value="Logout!" />
                
            </form>
            
            <form action="generateReports.php">
                <input type="submit" id="mainPageButtons" value="Generate Reports" />
            </form>
            
            <br />
            
            <?php
            
             $videoGames = videoGameList();
             
             ?>
    </body>
</html>