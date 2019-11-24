<nav id="navibar" class="navbar" role="navigation">
  <div id="navibarContainer" class="container-fluid" style="padding-right:0px;">
    <div id="navTitle" class="navbar-header">
      <h2 class="navTitle"><span class="glyphicon glyphicon-wrench"></span> PANOORD PANEL</h2>
    </div>
      <div id="navbar" style="float:right;">
        <td id="welcomeText">
          <?php if (isset($_SESSION['user_name'])) {echo "Welcome " . $_SESSION['user_name'] . ".";} else {echo "You're currently not logged in.";}?>
        </td>
        <td id="logout">
          <button id="logoutBtn" type="button" class="btn">
            LOGOUT  <span class="glyphicon glyphicon-off"></span>
          </button>
        </td>
      </div>
    </div>
</nav>
<div id="wrapping-container" class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <ul id="menuWrapper" class="nav nav-sidebar">
        <li><a id="btnnav_dashboard" class="menuItem" href="dashboard.php">DASHBOARD<span class="glyphicon glyphicon-dashboard pull-right"></span></a></li>
        <li><a id="btnnav_agenda-items" class="menuItem" href="agenda-items.php">AGENDA ITEMS<span class="glyphicon glyphicon-calendar pull-right"></span></a></li>
        <li><a id="btnnav_announcements" class="menuItem" href="announcements.php">MEDEDELINGEN<span class="glyphicon glyphicon-bullhorn pull-right"></span></a></li>
        <li><a id="btnnav_photos" class="menuItem" href="photos.php">FOTO'S BEHEREN<span class="glyphicon glyphicon-picture pull-right"></span></a></li>
        <li><a id="btnnav_settings" class="menuItem" href="settings.php">SETTINGS<span class="glyphicon glyphicon-cog pull-right"></span></a></li>
      </ul>
    </div>
    <div class="col-sm-9 col-md-10 main">
