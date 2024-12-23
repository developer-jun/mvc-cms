<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $page_title ?></title>
    <?php if(isset($meta_tags)): ?>
      <meta name="description" content="<?= $meta_tags->description ?>">
      <meta name="keywords" content="<?= $meta_tags->keywords ?>">
    <?php endif; ?>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?= ASSETS_URL ?>css/frame.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?= ASSETS_URL ?>css/controls.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?= ASSETS_URL ?>css/custom.css" media="screen" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <style>
      .menu-index {
        color: rgb(255, 255, 255) !important;
        opacity: 1 !important;
        font-weight: 700 !important;
      }
    </style>
  </head>

  <body>
    <div class="menu-container">
      <div class="menu">
        <div class="menu-table flex-row-space-between">
          <div class="logo flex-row-center">
            <a href="index.html">Project Title</a>
          </div>
          <a class="menu-button" tabindex="0" href="javascript:void(0)">
            <img src="<?= ASSETS_URL ?>images/menu.png">
          </a>
          <div class="menu-items flex-row-center flex-item">
            <a class="menu-index" href="<?= URL ?>home">Home</a>
            <a class="menu-widget" href="<?= URL ?>about">About</a>
            <a class="menu-widget" href="<?= URL ?>contact">Contact</a>
            <div class="dropdown">
              <a class="dropbtn" href="<?= URL ?>form">Form<i class="fas fa-caret-down"></i></a>
              <div class="dropdown-content">
                <a href="<?= URL ?>form">Overview</a>
                <a href="<?= URL ?>form">Widgets</a>
                <a href="<?= URL ?>form">Embedding</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php /*
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register With Us</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= ASSETS_URL ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= ASSETS_URL ?>css/custom.css" rel="stylesheet">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Forum</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="register.html">Register</a></li>
            <li><a href="create.html">Create Topic</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>*/ ?>