<?php 
    require_once('authorize.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Night Thinker</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto:300,400|Questrial|Satisfy">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
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
                <li class="active"><a href="newPost.php">Write New Post</a></li>
                <li><a href="admin.php">Manage Posts</a></li>
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
                <h2>Had a <span>Thought?</span></h2>
                <h2>Want to jot something <span>Down?</span></h2>
                <h2><span>Write</span> a <span>New Post!</span></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php

    // Verify and save all new post info to the database
    require_once('connectvars.php');

    if (isset($_POST['submit'])) 
    {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('<h3 class="title text-center section-padding">Sadly, this database connection failed.</h3>' . mysqli_error($dbc));

        // get the data from the form 
        $title = mysqli_real_escape_string($dbc, trim($_POST['title']));
        $date = mysqli_real_escape_string($dbc, trim($_POST['entryDate']));
        $content = mysqli_real_escape_string($dbc, trim($_POST['content']));

        // check to make sure all form fields have been filled out
        if (empty($title) || empty($date) || empty($content))
        {
            echo '<h3 class="title text-center section-padding">Are you sure you want to publish a blank post?<h3>';
        }
    }
    else 
    {
        $title = "";
        $date = "";
        $content = "";
    }

    // once all fields are full, save the blog entry in the database!
    if (!empty($title) && !empty($date) && !empty($content))
    {

        $query = "INSERT INTO blog_entries (title, date, content) " 
                . "VALUES ('$title', '$date', '$content')";

        mysqli_query($dbc, $query)
                or die('<h3 class="title text-center section-padding">Alas! Your blog entry could not be saved!</h3>');
        
        mysqli_close($dbc);

        echo '<h3 class="title text-center section-padding">Hooray! Your post is live!</h3>';

    }
    
?>

  <section class="section-padding wow fadeIn delay-05s">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <h2 class="topic-text text-center"><span class="deco">Write a New Post</span></h2>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form" class="contactForm">
                
          <div class="form-group">
            <input type="date" id="entryDate" name="entryDate" required="required" value="<?= $date; ?>" />
          </div>
                    
          <div class="form-group">
            <input type="text" class="form-control" name="title" required="required" id="title" placeholder="Title" value="<?= $title; ?>" />
          </div>
                    
          <div class="form-group">
            <textarea class="form-control" name="content" rows="5" placeholder="Message" value="<?= $content; ?>"></textarea>
          </div>
          <script>
            CKEDITOR.replace( 'content', {
                uiColor: '#cee9df',
            });
          </script>

          <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg">Save Post</button></div>
        </form>
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

</body>
</html>
