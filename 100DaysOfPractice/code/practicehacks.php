<?php
    require_once('utilities/startsession.php');

    $page_title = 'Practice Hacks';

    require_once('templates/header.php');

    require_once('utilities/appvars.php');
    require_once('utilities/connectvars.php');

    require_once('templates/navmenu.php');

    if (!isset($_SESSION['student_id']))
    {
        echo '<p>Please <a href="login.php">log in</a> to see this content.</p>';
        exit();
    }
?>

    <div class="jumbotron mt-5 bg-header">
        <h1 class="text-center page-title">Practice Hacks</h1>
        <p class="text-center secondary-page-title">Out of ideas? No matter what book you're in, we've got you covered.</p>
    </div>

    <div class="container p-5 bg-content">

<?php

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("The database connection failed.");

    // Get the student's Suzuki book from the student_list table 
    if (!isset($_GET['student_id']))
    {
        $query = "SELECT suzuki_book FROM student_list WHERE student_id = '" . $_SESSION['student_id'] . "'";
    }
    else 
    {
        $query = "SELECT suzuki_book FROM student_list WHERE student_id = '" . $_GET['student_id'] . "'";
    }

    $data = mysqli_query($dbc, $query)
            or die("The student's suzuki book could not be fetched.");

    $result = mysqli_fetch_array($data);

    $suzuki_book = $result['suzuki_book'];

    mysqli_close($dbc);

    if ($suzuki_book == "preTwinkle")
    {
?>

        <h2 class="content-header text-center">So, you're a Pre-Twinkler?</h2>
        <h3 class="text-center">Recommended Practice Time: 10-15 minutes</h3><br />
        <ul>
            <li>Do a violin workout!</li><br />
            <li>Not making bow hands on pencils yet? Practice stressed out fox/relaxed rabbit bow hand.</li><br />
            <li>Not using your bow yet? Practice making a slow bow hand on a pencil or pen. Hire someone from your family to try to steal it from you.</li><br />
            <li>Using your bow? Awesome! Make a slow bow hand and do "Up Like a Rocket" or "Open-the-Gate".</li><br />
            <li>Do you know the Ant Song? Go through all the parts of violin workout and play it.</li><br />
            <li>Do you know GDG? Go through all the parts of violin workout and play it.</li><br />
            <li>Listen to any piece from the Suzuki Book 1 CD.</li><br />
            <li>Play "Guess the String" with someone in your family. Take turns being the plucker and the guesser.</li>
        </ul>
    </div>

<?php
    }
    else if ($suzuki_book == 1 || $suzuki_book == 2)
    {
        echo '<h2 class="content-header text-center">So, you\'re in Book ' . $suzuki_book . '?</h2><br />';
?>

        <h3 class="text-center">Recommended Practice Time: 15-25 minutes</h3><br />
        <ul>
            <li>Do a violin workout!</li><br />
            <li>Make a slow bow hand and do "Up Like a Rocket" or "Open-the-Gate".</li><br />
            <li>Do you know any scales? Pick one to play...S  L  O  W  L  Y!</li><br />
            <li>Review Roulette! Make a list of review songs you like and roll a die. Play the song you rolled! (If you don't know 6 songs yet, that's OK! Pick a song you like and play it. Make sure it's not the same song you played yesterday!)</li><br />
            <li>Listen to any piece from the Suzuki Book 1, 2, or 3 CDs.</li><br />
            <li>Play "Guess the String" with someone in your family. Take turns being the plucker and the guesser.</li><br />
            <li>Do some theory flashcards--rhythms or notes on the staff are both cool with me!</li><br />
            <li>Are you working on "I Can Read Music"? Do a little sight-reading!</li>
        </ul>
    </div>

<?php
    }
    else if ($suzuki_book == 3 || $suzuki_book == 4)
    {
        echo '<h2 class="content-header text-center">So, you\'re in Book ' . $suzuki_book . '?</h2><br />';
?>

        <h3 class="text-center">Recommended Practice Time: 30-45 minutes</h3><br />
        <ul>
            <li>Play a 1 or 2-octave scale S  L  O  W  L  Y</li><br />
            <li>If you have any etudes, tonalizations, or exercises you're working on, play through one of them as a warm-up. Choose one spot to polish.</li><br />
            <li>Review Roulette! Make a list of review songs you like and roll a die. Play the song you rolled!</li><br />
            <li>Practice some sight-reading. Read a new etude. Try out a section of your piece that you haven't gotten to yet. Play some "I Can Read Music"--old or new.</li><br />
            <li>Listen to any piece from the Suzuki Book 3, 4, or 5 CDs.</li><br />
            <li>Polising your primary repertoire? Pick two or three spots to polish. Spend at least 5 minutes on each.</li><br />
            <li>Preparing for a performance? Play through your piece once without stopping. Assess the damage later ;)</li>
        </ul>
    </div>

<?php
    }
    else if ($suzuki_book == 5 || $suzuki_book == 6)
    {
        echo '<h2 class="content-header text-center">So, you\'re in Book ' . $suzuki_book . '?</h2><br />';
?>

        <h3 class="text-center">Recommended Practice Time: 45-60 minutes</h3><br />
        <ul>
            <li>Draw a 2 or 3-octave Major scale and a minor scale out of a hat and play them each twice: once with ghost note shifts, and once without.</li><br />
            <li>Review Roulette! Roll a die twice. The first roll will tell you what Suzuki book to use. The second roll will tell you what piece to play from that book.</li><br />
            <li>If you're working on an etude, play through it once as a warm-up, and choose three sections to polish.</li><br />
            <li>If you're NOT working on an etude, read a new one and see how it goes!</li><br />
            <li>Learning a new piece? Read through a new section that looks difficult!</li><br />
            <li>Polishing your primary repertoire? Choose one or two sections to <i>really</i> dig into. Spend 10 minutes on each.</li><br />
            <li>Preparing for a performance? Play your piece straight through from beginning to end. DON'T STOP! Assess the damage later ;)</li>
        </ul>
    </div>

<?php
    }
    else if ($suzuki_book == 7 || $suzuki_book == 8)
    {
        echo '<h2 class="content-header text-center">So, you\'re in Book ' . $suzuki_book . '?</h2><br />';
?>

        <h3 class="text-center">Recommended Practice Time: 60-90 minutes</h3><br />
        <ul>
            <li>Draw a 3-octave Major scale and a minor scale out of a hat and play them each twice: once with ghost note shifts, and once without.</li><br />
            <li>Review Roulette! Roll a die twice. The first roll will tell you what Suzuki book to use. The second roll will tell you what piece to play from that book.</li><br />
            <li>If you're working on an etude, play through it once as a warm-up, and choose three sections to polish.</li><br />
            <li>If you're NOT working on an etude, read a new one and see how it goes!</li><br />
            <li>Learning a new piece? Read through a new section that looks difficult!</li><br />
            <li>Polishing your primary repertoire? Choose three or four sections to <i>really</i> dig into. Set a timer and spend 4 minutes on each section. When you get to the last section, go back to the first one and repeat the process 2 or 3 times.</li><br />
            <li>Practice a fast passage with rhythms!</li><br />
            <li>Preparing for a performance? Play your piece straight through from beginning to end. DON'T STOP! Assess the damage later ;)</li><br />
            <li>If you're in a chamber group or orchestra, listen to (or play through!) one of your pieces with a recording and your part. What's going on around you? How do you fit in to the texture?</li>
        </ul>
    </div>

<?php
    }

    require_once('templates/footer.php');

?>