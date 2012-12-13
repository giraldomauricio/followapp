<?
include("framework.php");
$script = $_GET["load"] . ".public.php";
// Get baby by the token passed in the GET
if($_GET["token"])
{
	$baby = new baby_babies();
	$baby->getBabyByToken($_GET["token"]);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" href="assets/img/icon.png"/>
    <link rel="apple-touch-startup-image" href="assets/img/splash.png" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <title>Chloe's App</title>

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/datepicker.css" rel="stylesheet">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  </head>

  <body>

    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <!--<span class="icon-bar"></span>
            <span class="icon-bar"></span>-->
            <span class="icon-hand-up"></span>
          </button>
          <?
          if($_SESSION["baby"])
          {
          ?>
          <a class="brand" href="index.php?token=<?=$_GET["token"]?>"><img src="assets/img/logo.png"></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="index.php?load=feed&token=<?=$_GET["token"]?>">Feedings</a>
              </li>
              <li class="">
                <a href="index.php?load=rx&token=<?=$_GET["token"]?>">Rx</a>
              </li>
              <li class="">
                <a href="index.php?load=rxlog&token=<?=$_GET["token"]?>">Rx History</a>
              </li>
              <li class="">
                <a href="index.php?load=weight&token=<?=$_GET["token"]?>">Weight</a>
              </li>
              <!--
              <li class="">
                <a href="index.php?load=diapers&token=<?=$_GET["token"]?>">Diapers</a>
              </li>
              -->
              <?
              if($_SESSION["type"] == 2)
              {
              ?>
              <li class="">
                <a href="index.php?load=doctor">Patients</a>
              </li>
              <?
              }
              else
              {
              ?>
              <li class="">
                <a href="index.php?load=babies">Babies</a>
              </li>
              <?
              }
              ?>
              <li class="">
                <a href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
          <?
          }
          ?>
        </div>
      </div>
    </div>
    <div class="container">

      <?
      
      
      if ($script != "" && $script != null && file_exists($script))
        include($script);
      else
        include("main.index.php");
      ?>

      <hr>

      <div class="footer">
        <p>&copy; Mauricio Giraldo Mutis <?= date("Y") ?></p>

      </div> <!-- /container -->
    </div>
    <!-- Le javascript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>