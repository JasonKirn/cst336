<?php

if(isset($_GET["confirmButton"])) {
    header("Location: clear_cart.php");
}

?>

<html>
    <h1>Product(s) successfully purchased!</h1>
    <title>Purchase Complete</title>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form>
            <input type="submit" name="confirmButton" value="Ok">
        </form>
    </body>
</html>