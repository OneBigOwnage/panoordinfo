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
    <title>Foto's beheren - Panoord Panel</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menuStyle.css">
    <link rel="stylesheet" href="photosStyle.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include 'menu.php'; ?>

    <div id="photosContainer">
      <div id="currentPicsPanel">
        <div class="panel panel-default col-md-6">
          <div class="panel-heading clearfix">
              <h3 class="panel-title">Foto's in de carrousel</h3>
              <button id="refreshPhotosBtn" type="button" class="btn pull-right">
                <span class="glyphicon glyphicon-refresh"></span>
              </button>
              <button id="deletePhotosBtn" type="button" class="btn pull-right">
                <span class="glyphicon glyphicon-trash"></span>
              </button>
          </div>
          <div class="panel-body well">
            <!-- <div class="well well-sm"> -->
              <div id="IMGDiv" class="row thumbFix">
<!--  -->

<!--  -->
              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>

      <div id="uploadPanel">
        <div class="panel panel-default col-md-5 col-md-offset-1">
          <div class="panel-heading">
            <h3 class="panel-title">Foto's uploaden</h3>
          </div>
          <div class="panel-body">
            <form id="uploadForm" action="#" enctype="multipart/form-data" method="post">
              <label id="fileLabel" for="imageSelector"><span class="glyphicon glyphicon-folder-open"></span><p>Kies Bestanden</p></label>
              <button id="uploadBtn" type="submit" class="btn btn-sm upload btn-success pull-right"><span class="glyphicon glyphicon-cloud-upload"></span> Bestanden Uploaden</button>
              <input id="imageSelector" type="file" name="imageSelector" multiple>
            </form>
            <div id="uploadAlert" class="alert collapse">
              <p>

              </p>
            </div>
          </div>
        </div>
      </div>

          <div id="imghere" >

          </div>

    </div>





    <?php include 'menuEnd.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="refreshPhotos.js"></script>
  </body>
</html>
