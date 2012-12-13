<?
// ######################################################################
// Edit Form for baby_diapers table
// Built with ListBuilder by Mauricio Giraldo Mutis
// http://www.bymurdock.com
// This class was built on: 11/10/2012 06:11:51
// ClassBuilder classes requires ConDB v.1.1 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
require "framework.php";
$db_baby_diapers = new baby_diapers;
$return = false;
$db_baby_diapers->loadParams();
$db_baby_diapers->set_diaper_baby($_SESSION["baby"]);
$db_baby_diapers->set_diaper_date($_POST["diaper_date"]." ".$_POST["diaper_time"]);
if ($_POST["do"]=="edit_exec")
{
	$db_baby_diapers->updateOne($_POST["id"]);
	$return = true;
}
if ($_POST["do"]=="insert_exec")
{
	$db_baby_diapers->insertOne();
	$return = true;
}
if ($_POST["do"]=="delete_exec")
{
	$db_baby_diapers->deleteOne($_POST["id"]);
	$return = true;
}
if ($return) jsheader("index.php?load=diapers&token=".$_GET["token"]);
if ($_GET["do"]=="edit" || $_GET["do"]=="delete"){
	$db_baby_diapers->getOne($_GET["id"]);
	$db_baby_diapers->load();
}
?>
<script language="javascript" src="js/main.js"></script>
<form action="index.php?load=diapers.do&token=<?=$_GET["token"]?>" method="post" name="do_baby_diapers" id="do_baby_diapers" onSubmit="return validate_types(this);">
  
  
  <div class="row">
    <div class="span2">
      <label>Date</label>
      <!--<input name="diaper_date" type="date" id="diaper_date" value="<?=$db_baby_diapers->get_diaper_date();?>">-->
      <?
      $date = new utils();
      $date->renderMobileDates("diaper_date");
      ?>
    </div>  
  </div>
  
  <div class="row">
    <div class="span1">
      <label>Time</label>
      <!--<input class="span2" name="diaper_time" type="time" id="diaper_time" value="">-->
      <?
      $time = new utils();
      $time->renderMobileHours("diaper_time");
      ?>
    </div>  
  </div>
  
  <label class="checkbox">
  <input type="checkbox" value="1" name="diaper_1" id="diaper_1">
  Pee
</label>
  
  <label class="checkbox">
  <input type="checkbox" value="1" name="diaper_2" id="diaper_2">
  Poop
</label>
  
  <div class="row">
    <div class="span1">
      <label>Weight (Optional)</label>
      <div class="input-append">
      <input name="diaper_weight" type="number" id="diaper_weight" value="<?=$db_baby_diapers->get_diaper_weight();?>"><span class="add-on"> lb</span>
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
$db_baby_diapers->close();
?>