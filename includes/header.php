<?php ob_start(); ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test Task</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link href="../styles/main.css" rel="stylesheet">
</head>
<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Test Task</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">Main</a></li>
          <li><a href="terms.php">Terms of Use</a></li>
          <?php 
            session_start();
            if(!empty($_SESSION['email']) && !empty($_SESSION['name']))
            {
          ?>
          <li><a href="logout.php">LogOut</a></li>
          <?php } ?>
        </ul>

      </div>
    </div>
  </nav>