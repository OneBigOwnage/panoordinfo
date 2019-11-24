<?php
  session_start();
  if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
    header('Location: login.php');
    exit();
  } else {

  }
 ?>

  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Panoord Panel</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menuStyle.css">
    <link rel="stylesheet" href="dashboardStyle.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php include 'menu.php'; ?>

    <div id="dashboardContainer">

      <div class="panel panel-default col-xs-5">
        <div class="panel-body">
          <button id="goToPanelBtn" type="button" class="btn btn-default btn-lg">
            Naar het Panel<span class="glyphicon glyphicon-arrow-right"></span>
          </button>
          <button id="setUpdateBtn" type="button" class="btn btn-default btn-lg">
            Stuur Foto's Update <span class="glyphicon glyphicon-arrow-right"></span>
          </button>
        </div>
      </div>

      <div class="panel col-xs-5 col-xs-offset-2">
        <div class="panel-heading">
          <h3 class="panel-title">Update ChangeLog</h3>
        </div>
        <div class="panel-body">
          <ul class="list-group">
            <li class="list-group-item">
              <h4 class="list-group-item-heading">Foto's Verwijderen</h4>
              <p class="list-group-item-text">Het is vanaf nu mogelijk om foto's te verwijderen van het scherm. Om foto's te verwijderen ga je naar "Foto's beheren" en klik je de foto's aan die weg kunnen. Klik daarna op de prullenbak, en alle geselecteerde foto's zijn binnen enkele seconden weg.</p>
            </li>
            <li class="list-group-item">
              <h4 class="list-group-item-heading">Foto's Uploaden</h4>
              <p class="list-group-item-text">Het uploaden van foto's naar het scherm heeft een revamp gekregen, zo krijg je ondermeer een melding zodra de foto's klaar zijn met uploaden.</p>
            </li>
            <li class="list-group-item">
              <h4 class="list-group-item-heading">Gebruikers-Filter bij Agenda-items</h4>
              <p class="list-group-item-text">We hebben het User-filter op agenda-items weggehaald, je kunt nu ook de agenda-items van andere gebruikers zien/aanpassen.</p>
            </li>
          </ul>
        </div>
      </div>

    </div>


    <?php include 'menuEnd.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="dashboardScript.js"></script>
  </body>

  </html>
