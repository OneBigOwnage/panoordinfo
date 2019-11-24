<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>This is a test-page</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include 'menu.php';
    ?>
    <div class="panel panel-default">
      <div class="panel-heading"><center><h1>Hi<?php if (isset($_SESSION['username'])) {

        echo ' ' . $_SESSION['auth'];}  ?>, test here your functions!</h1></center></div>
      <div class="panel-body">
        <div class="helloo">
        <button id="btnsuccess" type="button" class="btn btn-success">Success</button>
        <button id="btnwarning" type="button" class="btn btn-warning">Warning</button>
        <button id="btndanger" type="button" class="btn btn-danger">Danger</button>
      </div>
      </div>
    </div>
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
  </body>
</html>
