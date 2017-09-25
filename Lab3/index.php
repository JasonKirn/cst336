<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        
        <?php
            //echo "hello ";
            
            $person = array(
                "name" => "player1",
                "profilePicUrl" => "./profile_pics/player1.png",
                "cards" => array(
                    array(
                        "suit" => "hearts",
                        "value" => "4"
                        ),
                    array(
                        "suit" => "clubs",
                        "value" => "10"
                        )
                    )
                );
            
            function displayPerson () {
                echo "<img src='".$person["ProfilePic"]."'>";
                
            // iterate through player's cards    
                for($i = 0; $i < $person["cards"].count; $i++) {
                    $card = $person["cards"][$i];
                
                    // construct the imgURL for each card
                    $imgURL = "./cards/".$cards["suit"]."/".$cards["value"].".png";
                
                    echo "<img src='.$imgURL.'>";
                
                    //echo $card["value"]." of ".$card["suit"];
                    //echo "<br>";
                
                
                }
            }
            
            function calculateHandValue($cards) {
                $sum = 0;
                
                foreach($cards as $card) {
                    $sum += $card["value"];
                }
                return $sum;
            }
            // show profile pic
          
            displayPerson("player1");
        
            //echo "name: ".$person["name"]."<br>";
            //echo "imgURL".$person["imgUrl"]."<br>";
        ?>
        
    </body>
</html>