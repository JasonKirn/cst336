var luckyNumArray = ['0', '0', '0', '0', '0'];
var rolledNum = "";
var min = 0;
var max = 100;

function generateLuckyNumArray() {
    for (var i = 0; i < 5; i++) {
        var randomNum = Math.ceil(Math.random() * (max - min) + min);
        //console.log(randomNum);
        
        luckyNumArray[i] = randomNum + " ";
        console.log(luckyNumArray[i]);
        /*$(".rollBtn").on("click", function() {
            $("luckyNumText").append(randomNum + " ");
        })*/
    }
}

function diceRoll() {
    var randomNum = Math.ceil(Math.random() * (max - min) + min);
    console.log(randomNum);
    rolledNum = randomNum;
}

function displayPictures() {
    for (var i = 0; i < 5; i++) {
        if (rolledNum == luckyNumArray[i]) {
            console.log("RolledNum equals a lucky num");
            $("#images").append("<img src='images/nice_roll.jpg' alt='Nice roll image' />");
            break;
        }
    }
    
    if (rolledNum > 70) {
        console.log("RolledNum above 70");
        $("#images").append("<img src='images/high_roller.jpg' alt='High roll image' />");
    }
}

function startApplication() {
    generateLuckyNumArray();
    diceRoll();
    displayPictures();
    //$("#showLuckyNums").remove();
    $("#luckyNumText").append("<p id='showLuckyNums'>" + luckyNumArray + "</p>");
    //$("#showRolledNum").remove();
    $("#resultText").append("<p id='showRolledNum'>" + rolledNum + "</p>");
    
    $(".rollBtn").on("click", function() {
        location.reload();
        
        //Recursive setup causes lag after a while and other issues, so going with location.reload
        //startApplication();
        //$("#resultText").append(rolledNum);  
        console.log("roll pressed");
        console.log(rolledNum);
    })
}


window.onload = startApplication();