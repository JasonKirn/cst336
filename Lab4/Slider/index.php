
<!DOCTYPE html>
<html>
    <?php
    $backgroundImage = "img/sea.jpg";
    
    // API call goes here
    if ((isset($_GET['keyword'])) || (isset($_GET['category']))) {
        
        if (($_GET['keyword'] == "") && ($_GET['category'] == "")) {
            //Set to 1 to go to homescreen, since nothing was inputed.
            $homeScreenBool = 1;
        }
        else {
            //Set to 0 to make sure we don't go to homescreen, since something was inputed.
            $homeScreenBool = 0;
            if ($_GET['category'] !== "") {
                $_GET['keyword'] = $_GET['category'];
            }
        
            include './api/pixabayAPI.php';
            if(isset($_GET['layout'])) {
                $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
            }
            else {
                $imageURLs = getImageURLs($_GET['keyword']);
            }
            $backgroundImage = $imageURLs[array_rand($imageURLs)];
        }
              
    }
    
?>
    <head>
        <title>Image Carousel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <style>
            @import url("./css/styles.css");
            body {
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
    </head>
    <body>
        <br/> <br/>
        <?php
            if ((!isset($imageURLs)) || ($homeScreenBool == 1)) {
                echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com </h2>";
                if ($homeScreenBool == 1) {
                    echo "Please type in a keyword or enter a category to search.";
                }
            } else {
                // Display Carousel Here
        ?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators Here -->
              <ol class="carousel-indicators">
                  <?php
                  for ($i = 0; $i < 7; $i++) {
                      echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                      echo ($i == 0)?" class='active'": "";
                      echo "></li>";
                  }
                  ?>
              </ol>
              <!-- Wrapper for Images -->
              <div class="carousel-inner" role="listbox">
                <?php
                    for ($i = 0; $i < 7; $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        }
                        while (!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="item ';
                        echo ($i == 0)?"active": "";
                        echo  '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
              </div>
              
              
              <!-- Controls Here -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
            </div>
        <!-- <h1> I'm a regular HTML tag inside the PHP else statement!</h1> -->
        
        <?php
            } // End of the else statement
        ?>
        <!-- HTML for goes here! -->
        <form>
            <div id="drop-down-menu">
            <!-- do those last values mean to be capitalized? -->
            <input type="text" name="keyword" placeholder="Keyword">
            <input type="submit" value="Submit" />
            
            <input type="Radio" name="layout" value="Horizontal">Horizontal
            <input type="Radio" name="layout" value="Vertical">Vertical
            <select name="category">
                <option value="">Select...</option>
                <option value="forest">forest</option>
                <option value="sky">sky</option>
                <option value="otters">otters</option>
                <option value="dogs">dogs</option>
                <option value="cars">cars</option>
            </select>
        </div>
        </form>
        <br/> <br/>
    </body>
</html>