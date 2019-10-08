<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Mad Libs: Story One</title>
    <link rel="stylesheet" type="text/css" href="formStyles.css" />
</head>
<body>
    <div class="formBackground">

<?php

    if (isset($_POST['submit']))
    {
        // get the data from the form
        $adjective      = $_POST['adjective'];
        $noun1          = $_POST['noun1'];
        $verbIng        = $_POST['verbIng'];
        $pluralNoun1    = $_POST['pluralNoun1'];
        $pluralNoun2    = $_POST['pluralNoun2'];
        $noun2          = $_POST['noun2'];
        $verbPast       = $_POST['verbPast'];
        $outputForm     = false;

        // check the form entries to make sure they've been filled out.
        if (empty($adjective) || empty($noun1) || empty($verbIng)
                || empty($pluralNoun1) || empty($pluralNoun2) || empty($noun2)
                || empty($verbPast))
        {
            echo '<h3>Hrm. It looks like you\'ve forgotten to fill out a ' .
                    'field or two...take another look!';
            $outputForm = true;
        }

    }
    else
    {
        $adjective = "";
        $noun1 = "";
        $verbIng = "";
        $pluralNoun1 = "";
        $pluralNoun2 = "";
        $noun2 = "";
        $verbPast = "";
        $outputForm = true;
    }

    if (!empty($adjective) && !empty($noun1) && !empty($verbIng)
            && !empty($pluralNoun1) && !empty($pluralNoun2) && !empty($noun2)
            && !empty($verbPast))
    {

        // save the entries to the database
        $dbc = mysqli_connect('localhost', 'student', 'student', 'mad_libs')
                or die('We tried to connect to the database but...no dice.');
        $fullStory = $adjective . ' Miss Muffet <br />' . 
                'Sat on a(n) ' . $noun1 . '<br />' .
                $verbIng . ' her ' . $pluralNoun1 . ' and ' . $pluralNoun2 . '.<br />' .
                'Along came a ' . $noun2 . '<br />' .
                'Which ' . $verbPast . ' down beside her<br />' . 
                'And frightened Miss Muffet away.'; 
        $query = "INSERT INTO miss_muffet (adjective, noun_1, verb_ing, plural_noun_1, plural_noun_2, noun_2, verb_past, full_story)" .
                " VALUES ('$adjective', '$noun1', '$verbIng', '$pluralNoun1', '$pluralNoun2', '$noun2', '$verbPast', '$fullStory')";

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
        echo '<a href="allStoryOnes.php" class="postStoryButton">Read More!</a>';
    }

    if ($outputForm)
    {
?>

    <h1>Story the FIRST:</h1>
    <h2>(Here; fill out this form!)</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="adjective">Adjective:</label>
        <input type="text" id="adjective" name="adjective"
               value="<?= $adjective; ?>" /><br />

        <label for="noun1">Noun:</label>
        <input type="text" id="noun1" name="noun1"
               value="<?= $noun1; ?>" /><br />

        <label for="verbIng">Verb ending in "ing":</label>
        <input type="text" id="verbIng" name="verbIng"
               value="<?= $verbIng; ?>" /><br />

        <label for="pluralNoun1">Plural Noun:</label>
        <input type="text" id="pluralNoun1" name="pluralNoun1"
               value="<?= $pluralNoun1; ?>" /><br />

        <label for="pluralNoun2">Plural Noun:</label>
        <input type="text" id="pluralNoun2" name="pluralNoun2"
               value="<?= $pluralNoun2; ?>" /><br />

        <label for="noun2">Noun:</label>
        <input type="text" id="noun2" name="noun2"
               value="<?= $noun2; ?>" /><br />

        <label for="verbPast">Verb (past tense):</label>
        <input type="text" id="verbPast" name="verbPast"
               value="<?= $verbPast; ?>" /><br />

        <input type="submit" name="submit" value="Write It!" class="endButtons" >
        <input type="reset" name="reset" value="Scrap It" class="endButtons" />
    </form>
    <a href="madLibsHome.html" class="homeButton">Never mind; take me home!</a>
    </div>

<?php
    }
?>

</body>
</html>
