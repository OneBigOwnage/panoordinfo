<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panoord Informatie-Scherm</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:900">
    <link rel="stylesheet" href="{{ mix('css/screen-styles.css') }}">
    <meta name="twitter:widgets:theme" content="dark">
    <meta name="twitter:widgets:chrome" content="noscrollbar">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div id="fullPageContainer"class="container-fluid">
      <div class="col-xs-8">
        <div id="topRow" class="col-xs-12" >
          <div id="announcementsDiv" class="col-xs-6">
            <div id="announcementsPanel" class="panel panel-green">
              <div class="panel-heading">
                <h3 class="panel-title">MEDEDELINGEN</h3>
              </div>
              <div class="panel-body tinyAnnouncementPanel">
<!-- ============================================== -->
                <div class="panel tinyAnnouncementPanel">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      <span class="glyphicon glyphicon-bullhorn"></span>
                      Titel van de mededeling.
                    </h3>
                  </div>
                  <div class="panel-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </div>
                </div>
<!-- ============================================== -->
              </div>
            </div>
          </div>
          <div id="agendaDiv" class="col-xs-6">
            <div id="agendaPanel" class="panel panel-green">
              <div class="panel-heading">
                <h3 class="panel-title">ACTIVITEITEN-AGENDA</h3>
              </div>
              <div class="panel-body tinyAgendaPanel">
<!-- ============================================== -->
                <div class="panel tinyAgendaPanel">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                      <span class="glyphicon glyphicon-pushpin"></span> Titel van het evenement!
                      <span class="label dateLabel pull-right">32 Oktembster</span>
                    </h3>
                  </div>
                  <div class="panel-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </div>
                </div>
<!-- ============================================== -->
              </div>
            </div>
          </div>
        </div>
        <div id="bottomRow" class="col-xs-12">
          <div id="picturesDiv" class="col-xs-8">
            <div id="picturesPanel" class="panel panel-green">
              <div class="panel-heading">
                <h3 class="panel-title">FOTO'S</h3>
              </div>
              <div class="panel-body">
                <div id="IMGcarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol id="carouselIndicators" class="carousel-indicators">
                    <li data-target="#IMGcarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#IMGcarousel" data-slide-to="1"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div id="carouselBody" class="carousel-inner">
<!-- ============================================== -->

<!-- ============================================== -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="weatherDiv" class="col-xs-4">
            <div id="weatherPanel" class="panel panel-green">
              <div class="panel-body">
                <iframe src="https://gadgets.buienradar.nl/gadget/zoommap/?lat=51.8175&lng=4.63333&overname=2&zoom=13&naam=Zwijndrech&size=2b&voor=1" scrolling=no width=330 height=330 frameborder=no></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-4">
        <div id="twitterDiv" class="col-xs-12">
          <div id="twitterPanel" class="panel panel-green">
            <div class="panel-heading">
              <h3 class="panel-title">TWITTER FEED</h3>
            </div>
            <div class="panel-body">
              <a id="timeline" class="twitter-timeline" href="https://twitter.com/ScoutingPanoord" data-chrome="nofooter transparent noheader"></a>
            </div>
          </div>
        </div>
        <div id="logoDiv" class="col-xs-12">
          <img id="logo" src="{{ asset('img/panoord-logo.png') }}" alt="">
        </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://platform.twitter.com/widgets.js"></script>
    <script src="{{ mix('js/screen.js') }}"></script>
  </body>
</html>
