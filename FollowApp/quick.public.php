<?
$rx = new baby_rx();
$rx->getOne($_GET["id"]);
$rx->load();
?>
<h2><?=$rx->get_rx_name()?></h2>
<h3><?=date("g:i a")?></h3>
<h4>Are you sure you want to quick entry this Rx?</h4>
<a href="" class="btn btn-large btn-success">Yes</a> | 
<a href="index.php" class="btn btn-large  btn-danger">No</a>