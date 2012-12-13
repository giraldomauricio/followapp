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
if ($_POST["do"]=="insert_exec")
{
	$db_baby_weight_log->insertOne();
	$return = true;
}
if ($return) jsheader("index.php?token=".$_GET["token"]);
?>
<script language="javascript" src="js/main.js"></script>
<form action="index.php?load=weight.quick&token=<?=$_GET["token"]?>" method="post" name="do_baby_weight_log" id="do_baby_weight_log" onSubmit="return validate_types(this);">

  <h2>Quick weight log</h2>
  <h3><?=date("m/d/Y")?></h3>
  
  <div class="row">
    <div class="span2">
      <div class="input-append">
      <input name="w_weight" type="number" id="w_weight" value=""><span class="add-on"> lb</span>
      </div>
    </div>  
  </div>
  
  <h4>Are you sure you want to quick entry this weight?</h4>  
  
          <input type="submit" name="Submit" value="LOG" class="btn btn-success btn-large">
  
      <input name="w_date" type="hidden" id="w_date" value="<?=date("Y-m-d")?>">
      <input name="do" type="hidden" id="do" value="insert_exec">
</form>
<?
$db_baby_weight_log->close();
?>