<?php
function determineCharacter($character1, $character2, $character3, $character4) {
            //For error testing
            $character = "NULL";
            $highestSum = 0;

            //iterate through characters
            for($i = 1; $i <= 4; $i++) {
                //compare current character's score to the highest sum.
                if (${'character'.$i}["totalPoints"] > $highestSum) {
                    $highestSum = ${'character'.$i}["totalPoints"];
                    $character = ${'character'.$i}["name"];
                }
            }
            return $character;
        }
?>