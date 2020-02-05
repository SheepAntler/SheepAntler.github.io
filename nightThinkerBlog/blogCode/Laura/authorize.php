
<?php
    // Immutable administrative login information
    $username = 'packing';
    $password = 'peanuts';

    if (!isset($_SERVER['PHP_AUTH_USER'])
            || !isset($_SERVER['PHP_AUTH_PW'])
            || ($_SERVER['PHP_AUTH_USER'] != $username)
            || ($_SERVER['PHP_AUTH_PW'] != $password))
    {
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

  <!-- =======================================================
    Theme Name: Laura
    Theme URL: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
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
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="readPosts.php">All Posts</a></li>
                <li><a href="newPost.php">Write New Post</a></li>
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
                <h2><span>WOAH, NELLY!</span></h2>
                <h2>You might not be <span>Elspeth</span></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="recentPosts" class="section-padding wow fadeInUp delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

<?php
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Night Thinker"');
    exit('<h2>Elspeth? Is that really you?</h2>Your username and '
            . 'password weren\'t valid...<br /><a href="authorize.php">Try Again?</a> '
            . '<br />I\'m not Elspeth; <a href="index.php">Take Me Home</a>');               
    }
?>

        </div>
      </div>
    </div>
  </section>

</body>
</html>
