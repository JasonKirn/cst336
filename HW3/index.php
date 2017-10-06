<!DOCTYPE html>
<html>
    <h1>Which <img id="logo" src="img/logo.png" alt="nintendo"> character are you quiz</h1>
    <?php
    include 'functions.php';
    
    if (((!isset($_GET["question1"])) || (!isset($_GET["question2"])) || (!isset($_GET["question3"])) || (!isset($_GET["question4"]))) && (isset($_GET["submitButton"]))) {
        echo "Required field not answered, please answer all required fields.";
    }
    else if ((isset($_GET["question1"])) && (isset($_GET["question2"])) && (isset($_GET["question3"])) && (isset($_GET["question4"])) && (isset($_GET["submitButton"]))){
        $mario = array(
            "name" => "Mario",
            "totalPoints" => 0
            );
            
        $luigi = array(
            "name" => "Luigi",
            "totalPoints" => 0
            );
        
        $link = array(
            "name" => "Link",
            "totalPoints" => 0
            );
            
        $kirby = array(
            "name" => "Kirby",
            "totalPoints" => 0
            );
    
    
        if (isset($_GET["question1"])) {
            $answer = $_GET['question1'];
            
            switch ($answer) {
                case Mario:
                    $mario["totalPoints"] += 1;
                    break;
                case Luigi:
                    $luigi["totalPoints"] += 1;
                    break;
                case Link:
                    $link["totalPoints"] += 1;
                    break;
                case Kirby:
                    $kirby["totalPoints"] += 1;
                    break;
            }
        }
    
        if (isset($_GET["question2"])) {
            $answer = $_GET['question2'];
            
            switch ($answer) {
                case Mario:
                    $mario["totalPoints"] += 1;
                    break;
                case Luigi:
                    $luigi["totalPoints"] += 1;
                    break;
                case Link:
                    $link["totalPoints"] += 1;
                    break;
                case Kirby:
                    $kirby["totalPoints"] += 1;
                    break;
            }
        }
        
        if (isset($_GET["question3"])) {
            $answer = $_GET['question3'];
            
            switch ($answer) {
                case Mario:
                    $mario["totalPoints"] += 1;
                    break;
                case Luigi:
                    $luigi["totalPoints"] += 1;
                    break;
                case Link:
                    $link["totalPoints"] += 1;
                    break;
                case Kirby:
                    $kirby["totalPoints"] += 1;
                    break;
            }
        }
        
        if (isset($_GET["question4"])) {
            $answer = $_GET['question4'];
            
            switch ($answer) {
                case Mario:
                    $mario["totalPoints"] += 1;
                    break;
                case Luigi:
                    $luigi["totalPoints"] += 1;
                    break;
                case Link:
                    $link["totalPoints"] += 1;
                    break;
                case Kirby:
                    $kirby["totalPoints"] += 1;
                    break;
            }
        }
        
        if (isset($_GET["characters"])) {
            $answer = $_GET['characters'];
            
            switch ($answer) {
                case Mario:
                    $mario["totalPoints"] += 1;
                    break;
                case Luigi:
                    $luigi["totalPoints"] += 1;
                    break;
                case Link:
                    $link["totalPoints"] += 1;
                    break;
                case Kirby:
                    $kirby["totalPoints"] += 1;
                    break;
            }
        }
        
        $determinedCharacter = determineCharacter($mario, $luigi, $link, $kirby);
        
        
        
        switch ($determinedCharacter) {
            case Mario:
                echo "You are <div id='mario-text'>$determinedCharacter</div>";
                echo "<img id='photo1' src='img/mario.png' alt='mario'>";
                break;
            case Luigi:
                echo "You are <div id='luigi-text'>$determinedCharacter</div>";
                echo "<img id='photo2' src='img/luigi.png' alt='luigi'>";
                break;
            case Link:
                echo "You are <div id='link-text'>$determinedCharacter</div>";
                echo "<img id='photo3' src='img/link.png' alt='link'>";
                break;
            case Kirby:
                echo "You are <div id='kirby-text'>$determinedCharacter</div>";
                echo "<img id='photo4' src='img/kirby.png' alt='kirby'>";
                break;
        }
        
    }
    
    
    ?>
    <head>
        <style>
            @import url("./css/styles.css");
        </style>
    </head>
    <body>
        
        <?php
        
        $mario = array(
            "name" => "Mario",
            "totalPoints" => 7
            );
            
        $luigi = array(
            "name" => "Luigi",
            "totalPoints" => 0
            );
            
        $link = array(
            "name" => "Link",
            "totalPoints" => 0
            );
            
        $kirby = array(
            "name" => "Kirby",
            "totalPoints" => 0
            );
        
        ?>
        
        
        
        
        <form>
            <!--
            Radio "questions"
            Submit "submit"
            TextArea "feedback"
            dropDown "who do you think you are"
            -->
            <div id='required-field'>  
            * - required field
            </div>
            
            <div id="question-text">Which of these colors is your favorite?</div>
            <div id="mario-color">
            <fieldset id="question1">
                <input type="Radio" name="question1" value="Mario"><span class="answer-text">Red<br>
                <input type="Radio" name="question1" value="Luigi">Green<br>
                <input type="Radio" name="question1" value="Kirby">Pink<br>
                <input type="Radio" name="question1" value="Link">Undecided</span><br>
            </fieldset>
            </div>
            
            <br>
            <br>
            
            <div id='required-field'>  
            * - required field
            </div>
            
            <div id="question-text">Which food would you prefer?</div>
            <div id="luigi-color">
            <fieldset id="question2">
                <input type="Radio" name="question2" value="Luigi"><span class="answer-text">Spaghetti<br>
                <input type="Radio" name="question2" value="Mario">Mushrooms<br>
                <input type="Radio" name="question2" value="Link">Soup<br>
                <input type="Radio" name="question2" value="Kirby">Cake</span><br>
            </fieldset>
            </div>
            
            <br>
            <br>
            
            <div id='required-field'>  
            * - required field
            </div>
            
            <div id="question-text">Do you have a sidekick?</div>
            <div id="link-color">
            <fieldset id="question3">
                <input type="Radio" name="question3" value="Mario"><span class="answer-text">Yes<br>
                <input type="Radio" name="question3" value="Luigi">I am the sidekick<br>
                <input type="Radio" name="question3" value="Link">No<br>
                <input type="Radio" name="question3" value="Kirby">Sometimes I have many</span><br>
            </fieldset>
            </div>
            
            <br>
            <br>
            
            <div id='required-field'>  
            * - required field
            </div>
            
            <div id="question-text">Which do you prefer wearing?</div>
            <div id="kirby-color">
            <fieldset id="question4">
                <input type="Radio" name="question4" value="Mario"><span class="answer-text">Red overalls<br>
                <input type="Radio" name="question4" value="Luigi">Green overalls<br>
                <input type="Radio" name="question4" value="Kirby">Nothing<br>
                <input type="Radio" name="question4" value="Link">A green suit</span><br>
            </fieldset>
            </div>
            
            <br>
            <br>
            
            <div id="question-text">Who do you feel you are on this list?</div>
            <fieldset id="question5">
                <select name="characters">
                    <option value="">Select...</option>
                    <option value="Mario">Mario</option>
                    <option value="Luigi">Luigi</option>
                    <option value="Link">Link</option>
                    <option value="Kirby">Kirby</option>
                </select>
            </fieldset>
            
            <br>
            <br>
            
            Any feedback?<br>
            <span class="text-box-text">
            <textarea name="message" rows="10" cols="30">
Type here...
            </textarea>
            </span>
            
            <br>
            
            <fieldset id="submitButton">
                <input type="submit" id="submit" name="submitButton" value="Submit" />
            </fieldset>
            
        </form>
    </body>
    <footer>
            <hr>
            CST336. 2017&copy; Kirn <br />
            <strong>Disclaimer:</strong> The information in this webpage is
            fictitous. <br />
            It is used for academic purposes only.
    </footer>
</html>