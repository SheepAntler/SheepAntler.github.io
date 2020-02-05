<?php
    require_once('MadLibs.php');

    $story_table = new MadLibs();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Mad Libs</title>
    <link rel="stylesheet" type="text/css" href="styles/allStoryStyles.css" />
</head>
<body>
    <div class="storyOutput">
    <h1>Can't get enough Limericks, eh?</h1>

<?php

    // Display all stories in a table, oldest to newest
    $story_table->displayAllStories();

    echo '<br /><h3 class="inspired">Feel Inspired?</h3>';
    echo '<a href="playMadLibs.php" class="writeButton">Write One!</a>';

?>

</div>
</body>
</html>
