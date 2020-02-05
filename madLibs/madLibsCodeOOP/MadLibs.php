<?php
    require_once('connectvars.php');

    class MadLibs 
    {
        private $noun; 
        private $verb;
        private $adjective;
        private $adverb; 
        private $story;

        // Get the user's entries
        public function getNoun()
        {
            return $this->noun;
        }

        public function getVerb()
        {
            return $this->verb;
        }

        public function getAdjective()
        {
            return $this->adjective;
        }

        public function getAdverb()
        {
            return $this->adverb;
        }

        public function getStory()
        {
            return $this->story;
        }

        // Save the user's entries into the program
        public function setNoun($noun) 
        {
            $this->noun = $noun;
        }

        public function setVerb($verb) 
        {
            $this->verb = $verb;
        }

        public function setAdjective($adjective) 
        {
            $this->adjective = $adjective;
        }

        public function setAdverb($adverb) 
        {
            $this->adverb = $adverb;
        }

        public function setStory($story) 
        {
            $this->story = $story;
        }

        // Save the user's entries into variables
        public function fillVariables() 
        {

            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die("The database is feeling uncoopertive right now.");

            $this->setNoun(mysqli_real_escape_string($dbc, trim($_POST['noun'])));
            $this->setVerb(mysqli_real_escape_string($dbc, trim($_POST['verb'])));
            $this->setAdjective(mysqli_real_escape_string($dbc, trim($_POST['adjective'])));
            $this->setAdverb(mysqli_real_escape_string($dbc, trim($_POST['adverb'])));

            mysqli_close($dbc);

        }

        // Insert the user's entries into a database 
        public function saveEntries() 
        {

            $this->setStory("There once was a " . $this->getNoun() . " named Fred<br />"
                    . "Who loved to " . $this->getVerb() . " prawns in a shed.<br/>"
                    . "His manners were " . $this->getAdjective() . "<br />"
                    . "For he always ate " . $this->getAdverb() . ",<br />"
                    . "But at least he was never unfed.");

            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die("The database is feeling uncoopertive right now.");

            $query = "INSERT INTO stories (noun, verb, adjective, adverb, full_story) "
                    . "VALUES ('" . $this->getNoun() . "', '" . $this->getVerb() . "', '" 
                    . $this->getAdjective() . "', '" . $this->getAdverb() . "', '" 
                    . $this->getStory() . "')";

            mysqli_query($dbc, $query)
                    or die("Funny story: your query failed." . mysqli_error($dbc));

            mysqli_close($dbc);
            
        }

        // Display the created story to the web page
        public function showStory() 
        {
            echo '<h1>Maybe it\'s Ridiculous. Maybe it\'s Beautiful.</h1>' .
                 '<h2>Either way, here\'s what you wrote:</h2>';
            echo '<p>';
            echo $this->getStory();
            echo '</p>';
            echo '<br /><br /><a href="playMadLibs.php" class="postStoryButton">Write Another!</a>';
            echo '<a href="allStories.php" class="postStoryButton">Read More!</a>';
        }

        // Find all created stories in the database, ordered newest to oldest
        public function displayAllStories() 
        {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die("The database is feeling uncooperative right now.");

            $query = "SELECT * FROM stories ORDER BY id DESC";

            $result = mysqli_query($dbc, $query)
                    or die("Funny story: your query failed." . mysqli_error($dbc));

            mysqli_close($dbc);

            $this->formatStoryTable($result);

        }

        // Print the displayed stories in a table 
        public function formatStoryTable($result) 
        {
            echo '<table><tr><th>Wisdom of the Ancients</th></tr>';
            
            while($row = mysqli_fetch_array($result))
            {
                $story = $row['full_story'];

                echo '<tr><td>' . $story . '</td></tr>';
            }

            echo '</table>';
        }

    }
?>