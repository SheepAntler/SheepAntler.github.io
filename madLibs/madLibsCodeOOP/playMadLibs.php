<?php
    require_once('MadLibs.php');

    $new_story = new MadLibs();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Mad Libs</title>
    <link rel="stylesheet" type="text/css" href="styles/formStyles.css" />
</head>
<body>

<div class="formBackground">

<?php
    if (isset($_POST['submit']))
    {

        // Get the user's entries from the form
        $new_story->fillVariables();

        $ouputForm = false;

        // Make sure the user filled out all fields 
        if (empty($new_story->getNoun()) || empty($new_story->getVerb()) 
                || empty($new_story->getAdjective()) || empty($new_story->getAdverb()))
        {
            echo '<h3>Hrm. It looks like you\'ve forgotten to fill out a '
                . 'field or two...take another look!';
            
            $outputForm = true;
        }
    }
    else 
    {

        $new_story->setNoun("");
        $new_story->setVerb("");
        $new_story->setAdjective("");
        $new_story->setAdverb("");

        $outputForm = true;

    }

    // If all words have been entered, save the user entries/story to a database and display it
    if (!empty($new_story->getNoun()) && !empty($new_story->getVerb())
            && !empty($new_story->getAdjective()) && !empty($new_story->getAdverb()))
    {
        
        $new_story->saveEntries();

        $new_story->showStory();

        $outputForm = false;
    }

    // As long as the user hasn't filled out all fields, keep showing the form
    if ($outputForm)
    {
?>

    <h1>Ye Olde Mad Libs Form:</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="noun">Noun:</label>
        <input type="text" id="noun" name="noun"
               value="<?= $new_story->getNoun(); ?>" /><br />

        <label for="verb">Verb:</label>
        <input type="text" id="verb" name="verb"
               value="<?= $new_story->getVerb(); ?>" /><br />

        <label for="adjective">Adjective:</label>
        <input type="text" id="adjective" name="adjective"
               value="<?= $new_story->getAdjective(); ?>" /><br />

        <label for="adverb">Adverb:</label>
        <input type="text" id="adverb" name="adverb"
               value="<?= $new_story->getAdverb(); ?>" /><br />

        <input type="submit" name="submit" value="Write It!" class="endButtons" />
        <input type="reset" name="reset" value="Scrap It" class="endButtons" />
    </form>
    <a href="index.php" class="homeButton">Never mind; take me home!</a>
    </div>

<?php
    }
?>

</body>
</html>
