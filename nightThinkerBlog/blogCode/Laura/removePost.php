<?php
    require_once('authorize.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto:300,400|Questrial|Satisfy">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Night Thinker</title>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" onload="myFunction()">
  <div class="header">
    <div class="bg-color">
      <header id="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#lauraMenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Night Thinker</a>
            </div>
            <div class="collapse navbar-collapse" id="lauraMenu">
              <ul class="nav navbar-nav navbar-right navbar-border">
                <li><a href="index.php">Home</a></li>
                <li><a href="readPosts.php">All Posts</a></li>
                <li><a href="newPost.php">Write New Post</a></li>
                <li class="active"><a href="admin.php">Manage Posts</a></li>
              </ul>
            </div>
          </div>
        </nav>
        </header>
        <div class="wrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-12 wow fadeIn delay-05s">
              <div class="banner-text">
                <h2><span>Are</span>
                <h2>you</h2>
                <h2><span>SURE?</span></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="posts" class="section-padding wow fadeIn delay-05s">

    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <h1 class="topic-text"><span class="deco">Admin!</span></h1>


<?php

    // Give the blog owner one last chance to confirm their desire to delete their post...just in case
    require_once('connectvars.php');

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];
    }
    else if (isset($_POST['id'])) 
    {
        $id = $_POST['id'];
    }
    else 
    {
        echo '<h3 class="title text-center">Hmm. It looks like you haven\'t selected a score for removal.</h3>';
    }

    if (isset($_POST['submit'])) 
    {
        if ($_POST['confirm'] == 'Yes')
        {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('<h3 class="title text-center">Boo! No database connection.</h3>');

            $query = "DELETE FROM blog_entries WHERE id = $id LIMIT 1";

            mysqli_query($dbc, $query)
                    or die('<h3 class="title text-center">Friends. Romans. Countryfolk. This query failed.</h3>.');

            mysqli_close($dbc);

            echo '<h3 class="title text-center">And STAY out! We never liked that post anyway!<br />(Your post was successfully removed.)</h3>';
        }
        else 
        {
            echo '<h3 class="title text-center">This post really has staying power...your post removal failed. Maybe it\'s a sign?</h3>';
        }
    }
    else if (isset($id))
    {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('<h3 class="title text-center">Boo! No database connection.</h3>');

        $query = "SELECT * FROM blog_entries WHERE id = $id LIMIT 1";

        $data = mysqli_query($dbc, $query)
                or die('<h3 class="title text-center">Friends. Romans. Countryfolk. This query failed.</h3>');
        
        $row = mysqli_fetch_array($data);

        $title = $row['title'];
        $date = $row['date'];

        echo '<p>Are you sure you want to delete the following post?</p>';
        echo '<p><strong>Title: </strong>' . $title . '<br /><strong>Date: </strong>' . $date . '</p>';
        echo '<form method="post" action="removePost.php">';
        echo '<input type="radio" class="confirm" name="confirm" value="Yes" /> Yes ';
        echo '<input type="radio" class="confirm" name="confirm" value="No" checked="checked" /> No <br />';
        echo '<input type="submit" name="submit" value="Submit" />';
        echo '<input type="hidden" name="id" value="' . $id . '" />';
        echo '<input type="hidden" name="title" value="' . $title . '" />';
        echo '</form>';
    }

?>

        </div>
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/custom.js"></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>
</html>