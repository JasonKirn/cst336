var selectedWord = "";
var selectedHint = "";
var board = "";
var remainingGuesses = 6;
var words = [{ word: "snake", hint: "It's a reptile" },
             { word: "monkey", hint: "It's a mammal" },
             { word: "beetle", hint: "It's an insect"}];
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];



            
console.log(words[0]);

function createLetters() {
    for (var letter of alphabet) {
        $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
    }
    
    $(".letter").click(function(){
        console.log($(this).attr("id"));
        checkLetter($(this).attr("id"));
        disableButton($(this));
    })
}

//Checks to see if the selected letter exists in the selectedWord
function checkLetter(letter) {
    var positions = new Array();
    
    //Put all the positions the letter exists in an array
    for (var i = 0; i < selectedWord.length; i++) {
        console.log(selectedWord)
        if (letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    
    if (positions.length > 0) {
        updateWord(positions, letter);
        
        //Check to see if this is a winning guess
        if (!board.includes('_')) {
            endGame(true);
        }
    } else {
        remainingGuesses -= 1;
        updateMan();
    }
    
    if (remainingGuesses <= 0) {
        endGame(false);
    }
}

function startGame() {
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
    
    //put here to execute after page loaded
    $(".replayBtn").on("click", function() {
        location.reload();
    })
    
    
}
            
//Fill in board with underscores
function initBoard() {
    for (var letter in selectedWord) {
        console.log("letter: " + letter);
        board += '_';
    }
}

function pickWord() {        
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
    console.log("random word: " + selectedWord);
    
    $(".hintBtn").on("click", function() {
        //.remove makes it so that user can't keep appending text
        $("#showHint").remove();
        $("#hintText").append("<p id='showHint'>Hint: " + selectedHint + "</p>");
    })
}
      
//Update the current word then calls for a board update
function updateWord(positions, letter) {
    for (var pos of positions) {
        board = replaceAt(board, pos, letter);
    }
    
    updateBoard();
}

//Helper function for replacing specific indexes in a string
function replaceAt(str, index, value) {
    return str.substr(0, index) + value + str.substr(index + value.length);
}
      
function updateBoard() {
    $("#word").empty();
    
    for (var letter of board) {
        document.getElementById("word").innerHTML += letter + " ";
    }
    
    $("#word").append("<br />");
    //$("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
}





//Calculates and updates the image for our stick man
function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

//Ends the game by hdiing game divs and displaying the win or loss divs
function endGame(win) {
    $("#letters").hide();
    
    if (win) {
        $('#won').show();
    } else {
        $('#lost').show();
    }
}

function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}
//$ in js is not a variable like it is in php
/*$("#letterBtn").click(function(){
    var boxVal = $("#letterBox").val();
    console.log("You pressed the button and it had the value: " + boxVal);
})*/

//Begin the game when the page is fully loaded
window.onload = startGame;