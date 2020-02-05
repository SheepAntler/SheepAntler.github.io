<?php
    require_once('utilities/startsession.php');
    
    $page_title = "Rules";

    require_once('templates/header.php');

    require_once('utilities/appvars.php');
    require_once('utilities/connectvars.php');

    require_once('templates/navmenu.php');
?>

    <div class="jumbotron mt-5 bg-header">
        <h1 class="text-center page-title">Rules and Regulations for your Trials and Tribulations</h1>
        <p class="text-center secondary-page-title">Familiarize yourself with the rules--then decide whether you want to <a href="signup.php" class="text-info">join the challenge</a>!</p>
    </div>

    <div class="container p-5 bg-content">

        <h2 class="text-center content-header">About the Challenge</h2>
        <p>What <i>IS</i> practice? Some musicians think of it as a game. Others (like yours truly) think of it as more of a chore. 
        But the truth is, practice is really just a habit. Now, as we all know, building a new habit can be nearly as hard as 
        breaking an old one. Forutnately for us, some clever soul dreamed up the 100 Days of Practice Challenge!</p>

        <p>In my life, I've found that the best way to tackle a new trial is to JUST START, rip-the-Band-Aid-off style!
        The 100 Days of Practice Challenge is designed to help you do just that--all you have to do is create an account 
        and log your practice sessions, and this app will take care of everything else!</p>

        <p>Now, I've got good news and bad news. I'll start with the bad news: completing the challenge will not be easy. 
        There will be days when you really don't want to get your violin out of the case. There will be days when you feel like you're 
        not actually achieving anything. But guess what? THAT'S OK! The important thing here is not consistent quality of work--
        it's really just consistency in general. Good days, bad days, <i>whatever</i>...just keep going, and you WILL succeed!
        I believe in you--and you should, too!</p><br /><br />

        <h2 class="text-center content-header">Rules</h2>
        <ol>
            <li>The challenge doesn't end until your counter hits 100.</li>
            <li>Each time you log a practice session, you must include a brief description of what you worked on.</li>
            <li>Consecutive practcie sessions must be logged before 48 hours elapse. Plan carefully: if you don't get two practice sessions logged in that time window, both your practice log and counter will be reset.</li>
            <li>You aren't allowed log two practice sessions in one day. No double-dipping!</li>
            <li>You are encouraged (but not required!) to use the personalized practice plan ideas provided for you once you begin the challenge.</li>
        </ol><br /><br />

        <h2 class="text-center content-header">So, what do you say?</h2>
        <div class="text-center">
            <div class="btn btn-black m-4 col-4"><a href="signup.php" class="text-info">Challenge Accepted?</a></div>
        </div>
    </div>

<?php
    require_once('templates/footer.php');
?>
