<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Mad Libs: Story Two</title>
    <link rel="stylesheet" type="text/css" href="formStyles.css" />
</head>
<body>
    <div class="formBackground">

<?php

    if (isset($_POST['submit']))
    {
        // get the data from the form
        $adjective      = $_POST['adjective'];
        $verb           = $_POST['verb'];
        $noun1          = $_POST['noun1'];
        $noun2          = $_POST['noun2'];
        $noun3          = $_POST['noun3'];
        $noun4          = $_POST['noun4'];
        $noun5          = $_POST['noun5'];
        $outputForm     = false;

        // check the form entries to make sure they've been filled out.
        if (empty($adjective) || empty($verb) || empty($noun1)
                || empty($noun2) || empty($noun3) || empty($noun4)
                || empty($noun5))
        {
            echo '<h3>Hrm. It looks like you\'ve forgotten to fill out a ' .
                    'field or two...take another look!';
            $outputForm = true;
        }

    }
    else
    {
        $adjective = "";
        $verb = "";
        $noun1 = "";
        $noun2 = "";
        $noun3 = "";
        $noun4 = "";
        $noun5 = "";
        $outputForm = true;
    }

    if (!empty($adjective) && !empty($verb) && !empty($noun1)
            && !empty($noun2) && !empty($noun3) && !empty($noun4)
            && !empty($noun5))
    {

        // save the entries to the database
        $dbc = mysqli_connect('localhost', 'student', 'student', 'mad_libs')
                or die('We tried to connect to the database but...no dice.');
        $fullStory = $adjective . ' Boy Blue <br />' . 
                'Come ' . $verb . ' your ' . $noun1 . '!<br />' . 
                'the ' . $noun2 . ' is in the meadow, <br />' . 
                'the ' . $noun3 . ' is in the corn.<br />' . 
                'Where is the ' . $noun4 . ' who looks after the sheep?<br />' . 
                'He is under the ' . $noun5 . ', fast asleep.';
        $query = "INSERT INTO boy_blue (adjective, verb, noun_1, noun_2, noun_3, noun_4, noun_5, full_story)" .
                " VALUES ('$adjective', '$verb', '$noun1', '$noun2', '$noun3', '$noun4', '$noun5', '$fullStory')";

        mysqli_query($dbc, $query)
                or die('Something fishy happened. We couldn\'t query the database.');

        mysqli_close($dbc);

        // print the story to the page
        echo '<h1>Maybe it\'s Ridiculous. Maybe it\'s Beautiful.</h1>' .
             '<h2>Either way, here\'s what you wrote:</h2>';
        echo '<p>';
        echo $fullStory;
        echo '</p>';
        echo '<br /><br /><a href="madLibsHome.html" class="postStoryButton">Write Another!</a>';
        echo '<a href="allStoryTwos.php" class="postStoryButton">Read More!</a>';
    }

    if ($outputForm)
    {
?>

    <h1>Story the SECOND:</h1>
    <h2>(Here; fill out this form!)</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="adjective">Adjective:</label>
        <input type="text" id="adjective" name="adjective"
               value="<?= $adjective; ?>" /><br />

        <label for="verb">Verb:</label>
        <input type="text" id="verb" name="verb"
               value="<?= $verb; ?>" /><br />

        <label for="noun1">Noun:</label>
        <input type="text" id="noun1" name="noun1"
               value="<?= $noun1; ?>" /><br />

        <label for="noun2">Noun:</label>
        <input type="text" id="noun2" name="noun2"
               value="<?= $noun2; ?>" /><br />

        <label for="noun3">Noun:</label>
        <input type="text" id="noun3" name="noun3"
               value="<?= $noun3; ?>" /><br />

        <label for="noun4">Noun:</label>
        <input type="text" id="noun4" name="noun4"
               value="<?= $noun4; ?>" /><br />

        <label for="noun5">Noun:</label>
        <input type="text" id="noun5" name="noun5"
               value="<?= $noun5; ?>" /><br />

        <input type="submit" name="submit" value="Write It!" class="endButtons" />
        <input type="reset" name="reset" value="Scrap It" class="endButtons" />
    </form>
    <a href="madLibsHome.html" class="homeButton">Never mind; take me home!</a>
    </div>

<?php
    }
?>

</body>
</html>
