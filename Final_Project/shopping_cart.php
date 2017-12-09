<?php
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
        
if (isset($_GET["clearCartButton"])) {
    header("Location: clear_cart.php");
}
if (isset($_GET["returnButton"])) {
    header("Location: purchasePage.php");
}

?>

<html>
    <head>
        <title>Shopping Cart</title>
        <h1>User shopping cart</h1>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        if(empty($_SESSION["shopping_cart"]["name"])){
            echo "<br>Your shopping cart is empty!";
        }
        else {
        ?>
        <br>
        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Year</th>
            </tr>
        <?php
                $quantity = 0;
                $total = 0;
                
                $sql = "
                SELECT 'Video Game', video_game_name, video_game_price, release_year
                FROM video_game";
                
                foreach($_SESSION['shopping_cart']['name'] as $item) {
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        if ($item == $row["video_game_name"]) {
                            echo "<tr><td>" .$row["video_game_name"]. "</td><td>".$row["video_game_price"]. "</td><td> ".$row["release_year"] ."</td></tr>";
                            $quantity += 1;
                            $str = substr($row["video_game_price"], 1);
                            $total += floatval($str);
                        }
                    }
                }
                echo "</table><br><table><tr><th>Total Items</th><th>Total Price</th></tr>";
                echo "<tr><td>" . $quantity . "</td><td>$" . number_Format($total, 2). "</td></tr>";
                
                $username = $_SESSION["username"];
                    
                
                $sql = "SELECT * FROM siteuser WHERE username = '$username'";
                $result = $conn->query($sql);
                
                $records = $result->fetch_assoc();
                
                $userCredits = $records["credits"];
                echo "Current user credits: $userCredits (NOTE: Each credit = $1.00)";
                
                if (isset($_GET["purchaseButton"])) {
                    //check if user has enough credits to purchase
                    $calc = $userCredits - $total;
                    
                    if (($calc) < 0) {
                        echo "<span class='transaction_error_text'><br><br>Cannot complete transaction, user does not have enough credits</span>";
                    }
                    else {
                        $sql = "UPDATE siteuser SET credits = credits - $total WHERE username = '$username'";
                        $conn->query($sql);
                        header("Location: purchaseConfirmationPage.php");
                    }
                }
        }
        ?>
        </table>
        <br><br>
        <form>
            <input type="submit" id="cart_page_buttons" name="clearCartButton" value="End Session" />
            <input type="submit" id="cart_page_buttons" name="purchaseButton" value="Purchase cart" />
            <input type="submit" id="cart_page_buttons" name="returnButton" value="Back" />
        </form>
    </body>
</html>