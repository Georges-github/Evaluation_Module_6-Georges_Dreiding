<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo( $titre );?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/style.css">
  </head>
  <body>
  
  <!-- ?php $URL_SITE = "http://192.168.56.10/Jour_13_13022025/"; ? -->
  <?php $URL_SITE = "http://192.168.33.10/Evaluation_Module_6/"; ?>
  <!--?php $URL_SITE = "http://192.168.56.10/evaluation_module_6/"; ?-->

  <header class="bg-primary">
    <nav class="navbar navbar-expand navbar-light container">
        <span class="navbar-brand text-white me-5">
            Evaluation Module 6
        </span>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?php echo( $URL_SITE ); ?>index.php?page=etudiants" class="btn btn-info btn-sm">Liste des étudiants</a>
            </li>
        </ul>
    </nav>
  </header>
