<?
// ######################################################################
// Edit Form for baby_feedings table
// Built with ListBuilder by Mauricio Giraldo Mutis
// http://www.bymurdock.com
// This class was built on: 11/09/2012 10:11:05
// ClassBuilder classes requires ConDB v.1.1 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
$db_baby_feedings = new baby_feedings;
$return = false;
$db_baby_feedings->loadParams();
$db_baby_feedings->set_feed_baby($_SESSION["baby"]);
$db_baby_feedings->set_feed_date($_POST["feed_date"]." ".$_POST["feed_time"]);
if ($_POST["do"]=="edit_exec")
{
	$db_baby_feedings->updateOne($_POST["id"]);
	$return = true;
}
if ($_POST["do"]=="insert_exec")
{
	$db_baby_feedings->insertOne();
	$return = true;
}
if ($_POST["do"]=="delete_exec")
{
	$db_baby_feedings->deleteOne($_POST["id"]);
	$return = true;
}
if ($return) jsheader("index.php?load=feed&token=".$_GET["token"]);
if ($_GET["do"]=="edit" || $_GET["do"]=="delete"){
	$db_baby_feedings->getOne($_GET["id"]);
	$db_baby_feedings->load();
}
?>
<script language="javascript" src="js/main.js"></script>
<form action="index.php?load=feed.do&token=<?=$_GET["token"]?>" method="post" name="do_baby_feedings" id="do_baby_feedings">
  <div class="row">
    <div class="span2">
      <label>Date</label>
      <?
      $date = new utils();
      $date->renderMobileDates("feed_date");
      ?>
      <!--<input class="span2" name="feed_date" type="date" id="feed_date" value="<?=$db_baby_feedings->get_feed_date();?>">-->
    </div>  
  </div>
  
        
  
  <div class="row">
    <div class="span1">
      <label>Time</label>
      <?
      $time = new utils();
      $time->renderMobileHours("feed_time");
      ?>
      <!--<input class="span2" name="feed_time" type="time" id="feed_time" value="<?=$db_baby_feedings->get_feed_date();?>">-->
    </div>  
  </div>
  
  
  
  
  <div class="row">
    <div class="span2">
      <label>Qty in ml</label>
      <div class="input-append">
      <input class="span2" name="feed_qty" type="number" id="feed_qty" value="<?=$db_baby_feedings->get_feed_qty();?>"><span class="add-on"> ml</span>
      </div>
    </div>  
  </div>
  
  <div class="row">
    <div class="span1">
      <label>Type</label>
      <div class="input-append">
      <?
      $feed_type = new utils();
      $feed_type->custom = array(1=>"Breast milk", 2=>"Formula");
      $feed_type->renderCustom("feed_type", $db_baby_feedings->get_feed_type());
      ?>
      </div>
    </div>  
  </div>
  
  <div class="row">
    <div class="span1">
      <label>Fortification in Cal (Optional)</label>
      <div class="input-append">
      <input class="span2" name="feed_xtra" type="number" id="feed_xtra" value="<?=$db_baby_feedings->get_feed_xtra();?>"><span class="add-on"> Cal</span>
      </div>
    </div>  
  </div>
  
  <div class="row">
    <div class="span1">
      <? if($_GET["do"]=="delete"){?>
          <input type="submit" name="Submit" value="DELETE" class="btn btn-danger btn-large">
          <?
  }else if($_GET["do"]=="insert"){
  ?>
          <input type="submit" name="Submit" value="ADD" class="btn btn-success btn-large">
          <?
  }
  else
  {
  ?>
          <input type="submit" name="Submit" value="SAVE" class="btn btn-info btn-large">
          <?
  }
  ?>
      <input name="do" type="hidden" id="do" value="<?=$_GET["do"]?>_exec">
      <input name="id" type="hidden" id="id" value="<?=$_GET["id"]?>">
      <input name="val_varchar" type="hidden" id="val_varchar" value="">
      <input name="val_int" type="hidden" id="val_int" value="">
    </div>
  </div>
  
</form>
<?
$db_baby_feedings->close();
?>