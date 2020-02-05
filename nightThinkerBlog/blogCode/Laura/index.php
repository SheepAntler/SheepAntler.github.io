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
              <a class="navbar-brand" href="#">Night Thinker</a>
            </div>
            <div class="collapse navbar-collapse" id="lauraMenu">
              <ul class="nav navbar-nav navbar-right navbar-border">
                <li class="active"><a href="#main-header">Home</a></li>
                <li><a href="#about">About Me</a></li>
                <li><a href="#recentPosts">Recent Posts</a></li>
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
                <h2><span>Streams</span> of <span>Consciousness</span></h2>
                <h2>from a <span>mind</span></h2>
                <h2><span>Addled</span> by <span>Exhaustion</span></h2>
              </div>
              <div class="overlay-detail text-center">
                <a href="#about"><i class="fa fa-angle-down"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section id="about" class="section-padding wow fadeIn delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-right">
          <h2 class="title-text-2">
            Meet<br><span class="deco">Elspeth Stalter-Clouse</span>
          </h2>
        </div>
        <div class="col-md-6 text-left">
          <div class="about-text">
            <p>Hi! I'm Elspeth, Night Owl Extraordinare. As a musician, I mostly work pseudo-second-shift hours, 
               which means that soon after I get home I'm the only one left awake. When I was in high school, my 
               dad and I used to stay up late together, working into the wee hours. Now, as an adult, I carry that tradition
               on myself, and write this blog to document my late-night coding expeditions. I love the silence of the nighttime--
               less loud noises, less distraction, less chaos...which, for good old ADHD me, always leads to more profound thinking 
               and more efficient working. It's absolute freedom, and I covet it fiercely. 
            </p>
            <p>&nbsp;</p>
            <ul class="abt-list">
              <li> I'm not "staying up too late"--</li>
              <li> I'm extending the parameters</li>
              <li> of my day.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="recentPosts" class="section-padding wow fadeInUp delay-05s">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="topic-text text-center"><span class="deco">Read my Most Recent Ridiculous Posts</span></h2>
        </div>

<?php

    // Display the five most recent posts the blog owner has made
    require_once('connectvars.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die('<h3 class="title text-center">The database is feeling uncooperative right now.</h3>.');

    $query = "SELECT * FROM blog_entries ORDER BY date DESC LIMIT 5";

    $result = mysqli_query($dbc, $query)
            or die('<h3 class="title text-center">Funny story: your query failed.</h3>' . mysqli_error($dbc));

    while ($row = mysqli_fetch_array($result))
    {
        echo '<h3>' . $row['title'] . '</h3>';
        echo '<p>' . $row['date'] . '</p>';
        echo '<pre><p>' . $row['content'] . '</p></pre>';
        echo '<br /><br />';
    }

    mysqli_close($dbc);

?>
      </div>
    </div>
  </section>
    <div class="container">
      <!--end row-->
      <div class="row">
        <div class="col-md-6">
          <div class="footer">
            © Copyright Laura Theme. All Rights Reserved
            <div class="credits">
              <!--
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Laura
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-right">
          <ul class="social-list">
            <li>
              <a href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-dribbble"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-vimeo"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-instagram"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <!--end row-->
    </div>
  </footer>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>
</html>
