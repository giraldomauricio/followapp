<?
if($_GET["log"])
{
  $log = new baby_rx_log();
  $log->getOne($_GET["log"]);
  $log->load();
}
if($_GET["id"])
{
$rx = new baby_rx();
$rx->getOne($_GET["id"]);
$rx->load();
?>
<h2><?=$rx->get_rx_name()?> @ <?=date("g:i a")?></h2>
<h4>Are you sure you want to quick entry this Rx?</h4>
<a href="index.php?load=quick.rx&add=<?=$_GET["id"]?>&log=<?=$_GET["log"]?>&token=<?=$_GET["token"]?>" class="btn btn-large btn-success">Yes</a> | 
<a href="index.php?token=<?=$_GET["token"]?>" class="btn btn-large  btn-danger">No</a> |
<a href="index.php?load=quick.rx&skip=<?=$_GET["id"]?>&log=<?=$_GET["log"]?>&token=<?=$_GET["token"]?>" class="btn btn-large btn-danger">Skip dose</a>
<h4>Or do you want to enter it as scheduled?</h4>
<a href="index.php?load=quick.rx&expected=<?=$_GET["id"]?>&log=<?=$_GET["log"]?>&token=<?=$_GET["token"]?>" class="btn btn-warning">Entry the scheduled time: <?=date("h:i",  strtotime($log->get_rxlog_date()))?></a>
<h4>Or do you want to round the time?</h4>
<a href="index.php?load=quick.rx&round=<?=$_GET["id"]?>&log=<?=$_GET["log"]?>&token=<?=$_GET["token"]?>&time=<?=date("H:00")?>" class="btn btn-warning">Entry at : <?=date("h:00")?></a>
|
<a href="index.php?load=quick.rx&round=<?=$_GET["id"]?>&log=<?=$_GET["log"]?>&token=<?=$_GET["token"]?>&time=<?=date("H:00",  mktime(date("H")+1, 0, 0, date("m"), date("d"), date("Y")))?>" class="btn btn-warning">Entry at : <?=date("h:00",  mktime(date("H")+1, 0, 0, date("m"), date("d"), date("Y")))?></a>
<?
}
if($_GET["add"])
{
  $extralog = new baby_rx_log();
  $extralog->set_rxlog_real(date("Y-m-d H:i:s"));
  $extralog->set_rxlog_delivered(1);
  $extralog->set_rxlog_rx($_GET["add"]);
  $extralog->set_rxlog_baby($_SESSION["baby"]);
  $extralog->updateOne($_GET["log"]);
  $newlog = new baby_rx_log();
  $newlog->set_rxlog_date(date("Y-m-d H:i:s"));
  $newlog->set_rxlog_real(date("Y-m-d H:i:s"));
  $newlog->set_rxlog_delivered(0);
  $newlog->set_rxlog_rx($_GET["add"]);
  $newlog->set_rxlog_baby($_SESSION["baby"]);
  $newlog->insertOne();
  $updateLog = new baby_rx_log();
  $updateLog->set_rxlog_baby($_SESSION["baby"]);
  $updateLog->updateNext($_GET["add"]);
  jsheader("index.php?token=".$_GET["token"]);
}
if($_GET["round"])
{
  $extralog = new baby_rx_log();
  $extralog->set_rxlog_real(date("Y-m-d")." ".$_GET["time"].":00");
  $extralog->set_rxlog_delivered(1);
  $extralog->set_rxlog_rx($_GET["round"]);
  $extralog->set_rxlog_baby($_SESSION["baby"]);
  $extralog->updateOne($_GET["log"]);
  
  $newlog = new baby_rx_log();
  $newlog->set_rxlog_date(date("Y-m-d H:i:s"));
  $newlog->set_rxlog_real(date("Y-m-d H:i:s"));
  $newlog->set_rxlog_delivered(0);
  $newlog->set_rxlog_rx($_GET["round"]);
  $newlog->set_rxlog_baby($_SESSION["baby"]);
  $newlog->insertOne();
  $updateLog = new baby_rx_log();
  $updateLog->set_rxlog_baby($_SESSION["baby"]);
  $updateLog->updateNext($_GET["round"]);
  jsheader("index.php?token=".$_GET["token"]);
}
if($_GET["expected"])
{
  $extralog = new baby_rx_log();
  $extralog->set_rxlog_real($log->get_rxlog_date());
  $extralog->set_rxlog_delivered(1);
  $extralog->set_rxlog_rx($_GET["expected"]);
  $extralog->set_rxlog_baby($_SESSION["baby"]);
  $extralog->updateOne($_GET["log"]);
  //print $extralog->sql;
  
  $newlog = new baby_rx_log();
  $newlog->set_rxlog_date($log->get_rxlog_date());
  $newlog->set_rxlog_real($log->get_rxlog_date());
  $newlog->set_rxlog_delivered(0);
  $newlog->set_rxlog_rx($_GET["expected"]);
  $newlog->set_rxlog_baby($_SESSION["baby"]);
  $newlog->insertOne();
  
  $updateLog = new baby_rx_log();
  $updateLog->set_rxlog_baby($_SESSION["baby"]);
  $updateLog->updateNext($_GET["expected"]);
  
  
  jsheader("index.php?token=".$_GET["token"]);
}
if($_GET["skip"])
{
  $log = new baby_rx_log();
  $log->set_rxlog_real(date("Y-m-d H:i:s"));
  $log->set_rxlog_delivered(1);
  $log->set_rxlog_rx($_GET["skip"]);
  $log->set_rxlog_baby($_SESSION["baby"]);
  $log->set_rxlog_skipped(1);
  $log->updateOne($_GET["log"]);
  $newlog = new baby_rx_log();
  $newlog->set_rxlog_date(date("Y-m-d H:i:s"));
  $newlog->set_rxlog_real(date("Y-m-d H:i:s"));
  $newlog->set_rxlog_delivered(0);
  $newlog->set_rxlog_rx($_GET["skip"]);
  $newlog->set_rxlog_baby($_SESSION["baby"]);
  $newlog->insertOne();
  $updateLog = new baby_rx_log();
  $updateLog->set_rxlog_baby($_SESSION["baby"]);
  $updateLog->updateNext($_GET["skip"]);
  jsheader("index.php?token=".$_GET["token"]);
}
?>