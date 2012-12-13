<?
// ######################################################################
// Edit Form for baby_rx_log table
// Built with ListBuilder by Mauricio Giraldo Mutis
// http://www.bymurdock.com
// This class was built on: 11/09/2012 11:11:50
// ClassBuilder classes requires ConDB v.1.1 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
$db_baby_rx_log = new baby_rx_log;
$return = false;
$db_baby_rx_log->loadParams();
$db_baby_rx_log->set_rxlog_baby($_SESSION["baby"]);
$db_baby_rx_log->set_rxlog_date($_POST["rxlog_date"] . " " . $_POST["feed_time"]);
$db_baby_rx_log->set_rxlog_date($_POST["rxlog_real"] . " " . $_POST["feed_real"]);

if ($_POST["do"] == "edit_exec") {
  $db_baby_rx_log->updateOne($_POST["id"]);
  $updateLog = new baby_rx_log();
  $updateLog->updateNext($_POST["rxlog_rx"]);
  $return = true;
}
if ($_POST["do"] == "insert_exec") {
  //$db_baby_rx_log->insertOne();
  $log = new baby_rx_log();
  $log->set_rxlog_date($_POST["rxlog_date"] . " " . $_POST["rxlog_time"]);
  $log->set_rxlog_real($_POST["rxlog_real"] . " " . $_POST["feed_real"]);
  $log->set_rxlog_delivered(1);
  $log->set_rxlog_rx($_GET["add"]);
  $log->insertOne($_GET["log"]);
  $newlog = new baby_rx_log();
  $newlog->set_rxlog_date($_POST["rxlog_date"] . " " . $_POST["rxlog_time"]);
  $newlog->set_rxlog_real($_POST["rxlog_real"] . " " . $_POST["feed_real"]);
  $newlog->set_rxlog_delivered(0);
  $newlog->set_rxlog_rx($_POST["rxlog_rx"]);
  $newlog->insertOne();
  $updateLog = new baby_rx_log();
  $updateLog->updateNext($_POST["rxlog_rx"]);
  $return = true;
}
if ($_POST["do"] == "delete_exec") {
  $db_baby_rx_log->deleteOne($_POST["id"]);
  $return = true;
}
if ($return)
  jsheader("index.php?load=rxlog&token=".$_GET["token"]);
if ($_GET["do"] == "edit" || $_GET["do"] == "delete") {
  $db_baby_rx_log->getOne($_GET["id"]);
  $db_baby_rx_log->load();
}
?>
<script language="javascript" src="js/main.js"></script>
<form action="index.php?load=rxlog.do&token=<?=$_GET["token"]?>" method="post" name="do_baby_rx_log" id="do_baby_rx_log" onSubmit="return validate_types(this);">

  <div class="row">
    <div class="span2">
      <label>Rx</label>
<?
$rx = new baby_rx();
$rx->getAll();
print $rx->dropdown("rxlog_rx", "rx_id", "rx_name", $db_baby_rx_log->get_rxlog_rx());
?>

    </div>  
  </div>

  <h3>Scheduled Time:</h3>
  
  <div class="row">
    <div class="span2">
      <label>Date</label>
      <!--<input name="rxlog_date" type="date" id="rxlog_date" value="<?= $db_baby_rx_log->get_rxlog_date(); ?>">-->
      <?
      $date = new utils();
      $date->renderMobileDates("rxlog_date",date("Y-m-d",  strtotime($db_baby_rx_log->get_rxlog_date())));
      ?>
    </div>  
  </div>

  <div class="row">
    <div class="span2">
      <label>Time</label>
      <!--<input name="rxlog_time" type="time" id="rxlog_time" value="<?= $db_baby_rx_log->get_rxlog_date(); ?>">-->
      <?
      $time = new utils();
      $time->renderMobileHours("feed_time",date("h:i:00",  strtotime($db_baby_rx_log->get_rxlog_date())));
      ?>
    </div>  
  </div>

  <h3>Actual Time:</h3>
  
  <div class="row">
    <div class="span2">
      <label>Date</label>
      <!--<input name="rxlog_date" type="date" id="rxlog_date" value="<?= $db_baby_rx_log->get_rxlog_date(); ?>">-->
      <?
      $date = new utils();
      $date->renderMobileDates("rxlog_real",date("Y-m-d",  strtotime($db_baby_rx_log->get_rxlog_real())));
      ?>
    </div>  
  </div>

  <div class="row">
    <div class="span2">
      <label>Time</label>
      <!--<input name="rxlog_time" type="time" id="rxlog_time" value="<?= $db_baby_rx_log->get_rxlog_date(); ?>">-->
      <?
      $time = new utils();
      $time->renderMobileHours("feed_real",date("h:i:00",  strtotime($db_baby_rx_log->get_rxlog_real())));
      ?>
    </div>  
  </div>
  

  <div class="row">
    <div class="span1">
<? if ($_GET["do"] == "delete") { ?>
        <input type="submit" name="Submit" value="DELETE" class="btn btn-danger btn-large">
        <?
      } else if ($_GET["do"] == "insert") {
        ?>
        <input type="submit" name="Submit" value="ADD" class="btn btn-success btn-large">
        <?
      } else {
        ?>
        <input type="submit" name="Submit" value="SAVE" class="btn btn-info btn-large">
        <?
      }
      ?>
      <input name="do" type="hidden" id="do" value="<?= $_GET["do"] ?>_exec">
      <input name="id" type="hidden" id="id" value="<?= $_GET["id"] ?>">
      <input name="val_varchar" type="hidden" id="val_varchar" value="">
      <input name="val_int" type="hidden" id="val_int" value="">
    </div>
  </div>
</form>
<?
$db_baby_rx_log->close();
?>