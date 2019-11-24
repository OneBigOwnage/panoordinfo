<?php
  session_start();
  if (isset($_SESSION['auth']) && $_SESSION['auth'] == 1){
    header('Location: /admin-page/dashboard.php');
    exit();
  }
 ?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panoord Login</title>

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

<body style="background: linear-gradient(141deg, rgb(15, 184, 173) 0%, rgb(31, 200, 219) 51%, rgb(44, 181, 232) 75%); background-attachment: fixed;">
  <div id="login-overlay" class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="modal-title" id="myModalLabel"><strong>Panoord Panel</strong></h4></center>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12">
            <div class="well">
              <form id="loginForm" onsubmit="checkLogin(); return false;" novalidate="novalidate">
                <div id="form-group"class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="username" type="text" class="form-control" required="true" placeholder="Username" data-toggle="popover" data-trigger="hover" data-content="Click anywhere in the document to close this popover">
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" required="true" title="Please enter your password" placeholder="Password" data-trigger="click" data-toggle="popover" title="Popover Header">
                  </div>
                </div>
                <button id="loginBtn" class="btn btn-success btn-block">Login</button>
                <div id="fail-alert" role="alert" class="alert alert-danger collapse"><strong>Wrong Username or Password!</strong></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/popover.js"></script> -->

  <script type="text/javascript" src="script.js"></script>
</body>

</html>
