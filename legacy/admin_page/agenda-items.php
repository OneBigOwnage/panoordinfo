<?php
  session_start();
  if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
    header('Location: login.php');
    exit();
  } else {
    include 'DBfunctions.php';
    include 'classes.php';
  }
 ?>

  <!DOCTYPE html>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      include 'menu.php';
      $agendaArray = getAgendaItems();?>

      <div id="agendaPanel" class="panel panel-default col-md-10">
        <div id="agendaPanelHeading" class="panel-heading clearfix">
          <div class="col-xs-11">
            <h4 class="panel-title"><span class="glyphicon glyphicon-calendar"></span> AGENDA-ITEMS</h4>
          </div>
          <div class="col-xs-1" style="">
            <button id="newAgendaBtn" type="button" class="btn pull-right newAgendaBtn" data-toggle="modal" data-target="#newAgendaModal">
              <span class="glyphicon glyphicon-plus"></span>
            </button></th>
          </div>

        </div>
        <div class="panel-body">
          <table id="agendaTable" class="table table-hover table-condensed table-curved">
            <thead>
              <tr>
                <th class="col-xs-4 col-md-2">
                  <div class="pull-right">
                    <strong>DATUM</strong>
                  </div>
                </th>
                <th class="col-xs-4 col-md-8"><strong>TITEL</strong></th>
                <th class="col-xs-4 col-md-2">
                </th>
            </thead>
            <tbody>

              <?php
              foreach ($agendaArray as $item) {
                echo '<tr>
                        <td class="col-xs-4 col-md-2">
                          <button type="button" class="btn btn-xs toggleContent" data-toggle="collapse" data-target="#content_' . $item->id . '">
                            <p><span class="glyphicon glyphicon-chevron-down"></span></p>
                          </button>
                          <span class="label pull-right">' . $item->date . ' </span>
                        </td>
                        <td class="col-xs-4 col-md-8">
                          <strong>' . $item->header . '</strong>
                        </td>
                        <td class="col-xs-4 col-md-2">
                          <div class="pull-right">
                            <button id="editBtn_' . $item->id . '" type="button" class="btn btn-sm  editbtn" data-toggle="modal" data-target="#editModal_' . $item->id . '"><span class="glyphicon glyphicon-pencil"></span></button>
                            <button id="delBtn_' . $item->id . '" type="button" class="btn btn-sm delBtntable" data-toggle="modal" data-target="#delAgendaModal_' . $item->id . '"><span class="glyphicon glyphicon-trash"></span></button>
                          </div>
                        </td>
                        </tr>
                        <tr id="content_' . $item->id . '" class="collapse">
                          <td colspan="4">' . $item->content . '</td>
                        </tr>';
              }?>


            </tbody>
          </table>
        </div>
      </div>


      <?php
        foreach ($agendaArray as $item) {
          echo '
          <div id="editModal_' . $item->id . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Agenda-item aanpassen: ' . $item->header . ':</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control itemHeader" placeholder="Titel..." value="' . $item->header . '">
                    </div>
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control itemDate" placeholder="Datum..." value="' . $item->date . '">
                    </div>
                    <div class="input-group col-xs-12">
                      <textarea rows="4" class="form-control itemContent" placeholder="Verdere uitleg van het item..." >' . $item->content . '</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>
                  <button id="saveAgenda_' . $item->id . '" type="button" class="btn btn-success saveBtn" data-dismiss="modal">Opslaan</button>
                </div>
              </div>
            </div>
          </div>
          ';}?>

       <?php
       foreach ($agendaArray as $item) {
         echo '
         <div id="delAgendaModal_' . $item->id . '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color:#e63838;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" style="font-size:35px;"><span class="glyphicon glyphicon-warning-sign"></span> Verwijderen?</h4>
              </div>
              <div class="modal-body">Weet U zeker dat U dit item wilt verwijderen?
              </div>
              <div class="modal-footer">
                <div class="col-xs-12">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Terug</button>
                  <button id="delBtn_' . $item->id . '" type="button" class="btn btn-danger delBtn" data-dismiss="modal">Verwijderen</button>
                </div>
              </div>
            </div>
          </div>
        </div>';}?>



    <div id="newAgendaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Nieuw agenda-item aanmaken</h4>
          </div>
          <div class="modal-body">
            <div class="input-group col-xs-12">
              <input id="newHeader" type="text" class="form-control" placeholder="Titel...">
            </div>
            <div class="input-group col-xs-12">
              <input id="newDate" type="text" class="form-control" placeholder="Datum...">
            </div>
            <div class="input-group col-xs-12">
              <textarea id="newContent" rows="4" class="form-control" placeholder="Verdere uitleg van het item..."></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>
            <button id="newSaveBtn"type="button" class="btn btn-success" data-dismiss="modal">Opslaan</button>
          </div>
        </div>
      </div>
    </div>




    <?php
      include 'menuEnd.php';
      ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
  </body>

  </html>
