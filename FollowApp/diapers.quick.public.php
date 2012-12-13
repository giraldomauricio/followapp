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
if ($_POST["do"]=="insert_exec")
{
	$db_baby_diapers->insertOne();
	$return = true;
}
if ($return) jsheader("index.php?token=".$_GET["token"]);
?>
<script language="javascript" src="js/main.js"></script>
<form action="index.php?load=diapers.quick&token=<?=$_GET["token"]?>" method="post" name="do_baby_diapers" id="do_baby_diapers" onSubmit="return validate_types(this);">
  
  <h2>Diaper Change</h2>
  <h3><?=date("m/d/Y")?></h3>
  
 
  
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
  
  <h4>Are you sure you want to quick entry this diaper change?</h4>  
  
  <div class="row">
    <div class="span1">
          <input type="submit" name="Submit" value="ADD" class="btn btn-success btn-large">
      <input name="do" type="hidden" id="do" value="insert_exec">
      <input name="diaper_date" type="hidden" id="diaper_date" value="<?=date("Y-m-d H:i:s")?>">
    </div>
  </div>
</form>
<?
$db_baby_diapers->close();
?>