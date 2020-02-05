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
                <h2><span>Mistakes Happen!</span>
                <h2><span>Remove</span> your <span>Misposts</span></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section-padding wow fadeIn delay-05s">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <h2 class="topic-text text-center"><span class="deco">Remove-a-Post-O-Matic</span></h2>

<?php

    // Display all posts the blog owner might want to delete
    require_once('connectvars.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die("Cue the tiny violin; we cannot connect to the database right now.");

    $query = "SELECT * FROM blog_entries ORDER BY date DESC, title ASC";

    $data = mysqli_query($dbc, $query)
        or die("Guess what? Your query failed.");

    mysqli_close($dbc);

    echo '<table class="table">';
    echo '<tr><th scope="col">Title</th><th scope="col">Date</th><th scope="col">Remove</th></tr>';
    while ($row = mysqli_fetch_array($data))
    {

        $id = $row['id'];
        $title = $row['title'];
        $date = $row['date'];

        echo '<tr><td>' . $title . '</td>';
        echo '<td>' . $date . '</td>';
        echo '<td><a href="removePost.php?id=' . $id . '">Delete</a>';
        echo '</td></tr>';

    }
    echo '</table>';

?>

      </div>
    </div>
  </div>\</section>

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