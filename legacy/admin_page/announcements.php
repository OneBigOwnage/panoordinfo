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
    <title>Agenda Items Bewerken - Panoord Panel</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menuStyle.css">
    <link rel="stylesheet" href="announcements.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include 'menu.php'; ?>

    <div id="announcementsMain" class="col-xs-12 col-md-10">
      <div class="panel">
        <div id="annPanelHeading" class="panel-heading clearfix">
            <div class="col-xs-8 col-md-10 heightFix">
              <span class="glyphicon glyphicon-bullhorn"></span> MEDEDELINGEN
            </div>
            <div class="col-xs-4 col-md-2 heightFix">
              <button id="newAnnouncementBtn" type="button" name="button" data-toggle="modal" data-target="#newAnnouncementModal"><span class="glyphicon glyphicon-plus"></span></button>
              <button id="refreshAnnouncementsBtn" type="button" name="button"><span class="glyphicon glyphicon-refresh"></span></button>
            </div>
        </div>
        <div class="panel-body">
          <table id="announcementsTable" class="table table-condensed">
            <thead>
              <!-- <tr>
                <th class="col-xs-1"></th>
                <th class="col-xs-9">TITEL</th>
                <th class="col-xs-4 col-md-2"></th>

              </tr> -->
            </thead>
            <tbody id="announcementsTableBody">


<!-- ====================================== -->
              <tr>
                <td class="col-xs-4 col-md-1">
                  <button id="myBtn" type="button" name="button" data-toggle="collapse" data-target="#myRow">
                    <span class="glyphicon glyphicon-chevron-down"></span>
                  </button>
                </td>
                <td class="col-xs-4 col-md-10">
                  Titel
                </td>
                <td class="col-xs-4 col-md-1">
                  <button type="button" name="button"><span class="glyphicon glyphicon-pencil"></span></button>
                  <button type="button" name="button"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
              </tr>


              <tr id="myRow" class="collapse">
                <td colspan="3">

                </td>
              </tr>
<!-- ====================================== -->


            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div id="editAnnDiv">

    </div>


    <div class="modal fade" id="newAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">NIEUWE MEDEDELING AANMAKEN</h4>
          </div>
          <div class="modal-body">
            <div class="input-group col-xs-12">
              <input id="newAnnHeader" type="text" class="form-control" placeholder="Titel...">
            </div>
            <div class="input-group col-xs-12">
              <textarea id="newAnnContent" rows="4" class="form-control" placeholder="Verdere uitleg van het item..."></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>
            <button id="btnSaveNewAnn" type="button" class="btn btn-success" data-dismiss="modal">Opslaan</button>
          </div>
        </div>
      </div>
    </div>




    <?php include 'menuEnd.php'; ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="announcements.js"></script>
  </body>
</html>
