<?php
    function generateLuckyNumbersArray() {
        $min = 0;
        $max = 100;
        $luckyNumbers = range($min, $max);
        $luckyNumArray = array();
                
        //Initialize rand;
        srand ((double)microtime()*1000000);
            
        for ($i = 0; $i < 5; $i++)
        {
            $k = rand(1, count($luckyNumbers))-1;
                
            $luckyNumArray[] = $luckyNumbers[$k];
                
            //prevents same number from being chosen
            array_splice($luckyNumbers, $k, 1);
        }
                
        return $luckyNumArray;
    }
    
    //display lucky numbers
    function displayArray($array) {
        echo "<div id='largetext'>";
        echo "<div id='bodyText'>";
        echo "Lucky numbers: ";
        for ($i = 0; $i < 5; $i++)
        {
            echo "$array[$i] ";
        }
        echo "</div>";
        echo "</div>";
    }
            
    function rollDice($array) {
        $k = rand(1, 100)-1;
        
        //boolean used to know when to print out try again picture.
        $eventBool = 0;
        //2nd boolean used for the case of high roll and lucky number being obtained.
        $eventBool2 = 0;
        echo "<br><br>";
        echo "<div id='largetext'>";
        echo "<div id='italisize'>";
        echo "You rolled ";
        echo "</div>";
        echo "<div id='orangeText'>";
        echo "<span class='bold'>$k</span>";
        echo "</div>";
        echo "</div>";        
                
        if ($k > 60) {
            echo '<figure id="eventImage">';
            echo '<img src="images/high_roller.jpg" alt="High Roll image" />';
            echo '</figure>';
            $eventBool = 1;
            $eventBool2 += 1;
        }
                
        for ($i = 0; $i < 5; $i++) {
            if ($array[$i] == $k) {
                echo '<figure id="eventImage2">';
                echo '<img src="images/nice_roll.jpg" alt="Lucky Roll image" />';
                echo '</figure>';
                $eventBool = 1;
                $eventBool2 += 1;
            }
        }
        
        if ($eventBool == 0) {
            echo '<figure id="tryAgainImage">';
            echo '<img src="images/try_again.jpg" alt="Try again image" />';
            echo '</figure>';
        }
        
        if ($eventBool2 == 2) {
            echo '<br>';
            echo "<div id='rainbowShadow'>";
            echo 'Feeling lucky today ey?';
            echo "</div>";
        }
    }
?>