<?
// ######################################################################
// Edit Form for baby_weight_log table
// Built with ListBuilder by Mauricio Giraldo Mutis
// http://www.bymurdock.com
// This class was built on: 11/10/2012 12:11:20
// ClassBuilder classes requires ConDB v.1.1 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
$db_baby_weight_log = new baby_weight_log;
$return = false;
$db_baby_weight_log->loadParams();
$db_baby_weight_log->set_w_baby($_SESSION["baby"]);
if ($_POST["do"]=="edit_exec")
{
	$db_baby_weight_log->updateOne($_POST["id"]);
	$return = true;
}
if ($_POST["do"]=="insert_exec")
{
	$db_baby_weight_log->insertOne();
	$return = true;
}
if ($_POST["do"]=="delete_exec")
{
	$db_baby_weight_log->deleteOne($_POST["id"]);
	$return = true;
}
if ($return) jsheader("index.php?load=weight&token=".$_GET["token"]);
if ($_GET["do"]=="edit" || $_GET["do"]=="delete"){
	$db_baby_weight_log->getOne($_GET["id"]);
	$db_baby_weight_log->load();
}
?>
<script language="javascript" src="js/main.js"></script>
<form action="index.php?load=weight.do&token=<?=$_GET["token"]?>" method="post" name="do_baby_weight_log" id="do_baby_weight_log" onSubmit="return validate_types(this);">
  
  <div class="row">
    <div class="span2">
      <label>Date</label>  
      <!--<input name="w_date" type="date" id="w_date" value="<?=$db_baby_weight_log->get_w_date();?>">-->
      <?
      $date = new utils();
      $date->renderMobileDates("w_date");
      ?>
    </div>  
  </div>
  
  <div class="row">
    <div class="span2">
      <div class="input-append">
      <input name="w_weight" type="number" id="w_weight" value="<?=$db_baby_weight_log->get_w_weight();?>"><span class="add-on"> lb</span>
      </div>
    </div>  
  </div>
  
  
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
      <input name="val_varchar" type="hidden" id="val_varchar" value="rx_name,">
      <input name="val_int" type="hidden" id="val_int" value="">
</form>
<?
$db_baby_weight_log->close();
?>