<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Mad Libs: All Miss Muffet Stories</title>
    <link rel="stylesheet" type="text/css" href="allStoryStyles.css" />
</head>
<body>
    <div class="storyOutput">
    <h1>Here's Little Miss Muffet's History of Ridiculosity*. Enjoy!</h1>
    <h3>*(ridiculosity may or may not be a word.)</h3>

<?php
    // get the data from the miss_muffet table
    $dbc = mysqli_connect('localhost', 'student', 'student', 'mad_libs')
            or die('We tried to connect to the database, but...no dice.');

    $query = "SELECT * from miss_muffet ORDER BY storyid DESC";

    $result = mysqli_query($dbc, $query)
            or die('Something fishy happened. We couldn\'t query the database.');

    mysqli_close($dbc);

    // print all of the stories to the page
    while($row = mysqli_fetch_array($result))
    {
        $fullStory = $row['full_story'];

        echo $fullStory;
        echo '<br /><br />';
    }
    echo '<br /><h3 class="inspired">Feel Inspired?</h3>';
    echo '<a href="madLibsHome.html" class="writeButton">Write One!</a>';
?>

</div>
</body>
</html>
