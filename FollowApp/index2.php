<?
require("framework.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php">Baby Tracker</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="">
                <a href="index.php?load=feed">Feedings</a>
              </li>
              <li class="">
                <a href="index.php?load=rxlog">Rx</a>
              </li>
              <li class="">
                <a href="index.php?load=weight">Weight</a>
              </li>
              <li class="">
                <a href="index.php?load=diapers">Diapers</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">

      <h3>
<?=BABY_NAME?>
<?
$weight = new baby_weight_log();
print $weight->currentWeight()
?>
  <a href="index.php?load=weight.quick" class="btn btn-small btn-success">Quick entry</a>
</h3>
<h4>Next feeding:</h4>
<h3>
<?
$feeding = new baby_feedings();
print $feeding->nextFeeding();
?>
  <a href="index.php?load=quick.feed" class="btn btn-small btn-success">Quick entry</a>
</h3>
<h4>Next Rx:</h4>
<h5>
<?
$rx = new baby_rx();
print $rx->nextRx();
?>
</h5>
<a class="btn btn-info" href="index.php"><i class="icon-refresh icon-white"></i> Refresh Screen</a>
    </div> <!-- /container -->

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
