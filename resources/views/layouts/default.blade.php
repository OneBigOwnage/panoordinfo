<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Font & Icon -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Main Style -->
  <link rel="stylesheet" href="{{ mix('/css/admin-app.css') }}" id="main-css">
  <link rel="stylesheet" href="#" id="sidebar-css">

  <title>Panoord infoscherm</title>
</head>

<body>

  <!-- Sidebar -->
  <aside class="sidebar border-right">

    <!-- Sidebar header -->
    <div class="sidebar-header">
      <!-- Logo -->
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../img/logo.svg" alt="Logo" id="main-logo">
        Panoord infoscherm
      </a>
      <a href="#" class="nav-link nav-icon rounded-circle ml-auto" data-toggle="sidebar">
        <i class="material-icons">close</i>
      </a>
    </div>

    <!-- Sidebar body -->
    <div class="sidebar-body">
      <!-- Menu -->
      <ul class="nav nav-sub mt-3" id="menu">

        @foreach ($menuItems as $item)
          <li class="nav-item">
            <a class="nav-link has-icon" href="{{ $item->link }}">
              <i class="{{ $item->icon }}"></i>
              {{ $item->text }}
            </a>
          </li>
        @endforeach

      </ul>
      <!-- /Menu -->
    </div>
    <!-- /Sidebar body -->

  </aside>
  <!-- /Sidebar -->

  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-light fixed-top navbar-main">
    <div class="navbar-nav nav-circle">
      {{-- <a class="nav-link nav-icon" href="#" data-toggle="sidebar"><i class="material-icons">menu</i></a> --}}
    </div>
    <ul class="navbar-nav nav-circle ml-auto">
    </ul>
    <ul class="navbar-nav nav-pills">
      <li class="nav-link-divider mx-2"></li>
      <li class="nav-item dropdown">
        <a class="nav-link has-img dropdown-toggle" href="#" data-toggle="dropdown">
          <img src="../img/user.svg" alt="Admin" class="rounded-circle mr-2">
          <span class="d-none d-sm-block">Admin</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right font-size-sm">
          <a class="dropdown-item has-icon pr-5 text-danger" href="../html/login.html"><i class="material-icons mr-2">exit_to_app</i> Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /Navbar -->

  <!-- Main Content -->
  <main>

  </main>
  <!-- /Main Content -->

  <!-- Backdrop for expanded sidebar -->
  <div class="sidebar-backdrop" id="sidebarBackdrop" data-toggle="sidebar"></div>

  <!-- Main Scripts -->
  <script src="{{ mix('/js/admin-app.js') }}"></script>

</body>

</html>
