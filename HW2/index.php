<!DOCTYPE html>
<?php

include 'functions.php';

?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>HW2: 100 Sided Dice Roll</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            <div id="underline">
            <div id="shadowText">
            <h1> 100 Sided Dice Luck Simulator</h1>
            </div></div>
        </header>
        
        <figure id="dice">
            <img src="images/dice.jpg" alt="Picture of 100 sided dice"/>
        </figure>
        
        <?php
            $arrayOfLuckyNumbers = generateLuckyNumbersArray();

            displayArray($arrayOfLuckyNumbers);
            
            rollDice($arrayOfLuckyNumbers);
        ?>
        
        
        
        <footer>
            <hr>
            CST336. 2017&copy; Kirn <br />
            <strong>Disclaimer:</strong> The results of these dice rolls
            do not actually determine your luck, it is mainly used for fun.<br />
        </footer>
    </body>
</html>