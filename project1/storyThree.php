<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Mad Libs: Story Three</title>
    <link rel="stylesheet" type="text/css" href="formStyles.css" />
</head>
<body>
    <div class="formBackground">

<?php

    if (isset($_POST['submit']))
    {
        // get the data from the form
        $noun           = $_POST['noun'];
        $pluralNoun1    = $_POST['pluralNoun1'];
        $pluralNoun2    = $_POST['pluralNoun2'];
        $pluralNoun3    = $_POST['pluralNoun3'];
        $adverb         = $_POST['adverb'];
        $outputForm     = false;

        // check the form entries to make sure they've been filled out.
        if (empty($noun) || empty($pluralNoun1) || empty($pluralNoun2)
                || empty($pluralNoun3) || empty($adverb))
        {
            echo '<h3>Hrm. It looks like you\'ve forgotten to fill out a ' .
                    'field or two...take another look!';
            $outputForm = true;
        }

    }
    else
    {
        $noun = "";
        $pluralNoun1 = "";
        $pluralNoun2 = "";
        $pluralNoun3 = "";
        $adverb = "";
        $outputForm = true;
    }

    if (!empty($noun) && !empty($pluralNoun1) && !empty($pluralNoun2)
            && !empty($pluralNoun3) && !empty($adverb))
    {

        // save the entries to the database
        $dbc = mysqli_connect('localhost', 'student', 'student', 'mad_libs')
                or die('We tried to connect to the database but...no dice.');
        $fullStory = 'There was an old woman who lived in a ' . $noun .'.<br />' . 
                'She had so many ' . $pluralNoun1 . ', she did not know what to do.<br />' . 
                'She gave them some ' . $pluralNoun2 . ' without any ' . $pluralNoun3 . ';<br />' . 
                'Then whipped them all ' . $adverb . ' and put them to bed.<br />';
        $query = "INSERT INTO shoe_woman (noun, plural_noun_1, plural_noun_2, plural_noun_3, adverb, full_story)" .
                " VALUES ('$noun', '$pluralNoun1', '$pluralNoun2', '$pluralNoun3', '$adverb', '$fullStory')";

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
        echo '<a href="allStoryThrees.php" class="postStoryButton">Read More!</a>';
    }

    if ($outputForm)
    {
?>

    <h1>Story the THIRD:</h1>
    <h2>(Here; fill out this form!)</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="noun">Noun:</label>
        <input type="text" id="noun" name="noun"
               value="<?= $noun; ?>" /><br />

        <label for="pluralNoun1">Plural Noun:</label>
        <input type="text" id="pluralNoun1" name="pluralNoun1"
               value="<?= $pluralNoun1; ?>" /><br />

        <label for="pluralNoun2">Plural Noun:</label>
        <input type="text" id="pluralNoun2" name="pluralNoun2"
               value="<?= $pluralNoun2; ?>" /><br />

        <label for="pluralNoun3">Plural Noun:</label>
        <input type="text" id="pluralNoun3" name="pluralNoun3"
               value="<?= $pluralNoun3; ?>" /><br />

        <label for="adverb">Adverb:</label>
        <input type="text" id="adverb" name="adverb"
               value="<?= $adverb; ?>" /><br />

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
