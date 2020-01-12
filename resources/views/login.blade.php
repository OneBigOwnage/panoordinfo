<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Font & Icon -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Plugins -->

  <!-- Main Style -->
  <link rel="stylesheet" href="{{ mix('/css/admin-app.css') }}" id="main-css">

  <title>Panoord infoscherm - Login</title>
</head>

<body class="login-page">

  <div class="container pt-5">
    <div class="row justify-content-center">
      <div class="col-md-auto d-flex justify-content-center">
        <div class="card shadow-sm">
          <div class="card-body p-4">

            <h4 class="card-title text-center mb-0">LOG IN</h4>
            <div class="text-center text-muted font-italic">op het beheerderspaneel</div>
            <hr>

            <form action="/login" method="POST">
              @csrf
              <div class="form-group">
                <span class="input-icon">
                  <i class="material-icons">person_outline</i>
                  <input name="email" type="text" class="form-control" placeholder="Gebruikersnaam">
                </span>
              </div>
              <div class="form-group">
                <span class="input-icon">
                  <i class="material-icons">lock_open</i>
                  <input name="password" type="password" class="form-control" placeholder="Wachtwoord">
                </span>
              </div>


              @if (session()->get('invalid-username', false))
                <div class="alert alert-danger" role="alert">
                  Deze combinatie van gebruikersnaam en wachtwoord is niet bij ons bekend.
                </div>
              @endif

              <button type="submit" class="btn btn-primary btn-block">LOG IN</button>
            </form>

            <hr>

            <div class="small text-muted">
              Kunt u niet inloggen?<br>Neem dan contact op met uw systeembeheerder.
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
