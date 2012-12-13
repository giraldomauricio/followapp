<?
// ######################################################################
// Edit Form for baby_rx table
// Built with ListBuilder by Mauricio Giraldo Mutis
// http://www.bymurdock.com
// This class was built on: 11/09/2012 11:11:06
// ClassBuilder classes requires ConDB v.1.1 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
$db_baby_rx = new baby_rx;
$return = false;
$db_baby_rx->loadParams();
if ($_POST["do"]=="edit_exec")
{
	$db_baby_rx->updateOne($_POST["id"]);
	$return = true;
}
if ($_POST["do"]=="insert_exec")
{
	$db_baby_rx->insertOne();
	$return = true;
}
if ($_POST["do"]=="delete_exec")
{
	$db_baby_rx->deleteOne($_POST["id"]);
	$return = true;
}
if ($return) header("Location: baby_rx.list.php");
if ($_GET["do"]=="edit" || $_GET["do"]=="delete"){
	$db_baby_rx->getOne($_GET["id"]);
	$db_baby_rx->load();
}
?>
<script language="javascript" src="js/main.js"></script>
<form action="baby_rx.do.php" method="post" name="do_baby_rx" id="do_baby_rx" onSubmit="return validate_types(this);">
  
  <div class="row">
    <div class="span2">
      <label>Name</label>
      <input name="rx_name" type="text" id="rx_name" value="<?=$db_baby_rx->get_rx_name();?>" maxlength="80">
    </div>  
  </div>
  
  <div class="row">
    <div class="span2">
      <label>Qty</label>
      <div class="input-append">
      <input name="rx_qty" type="number" id="rx_qty" value="<?=$db_baby_rx->get_rx_qty();?>"><span class="add-on"> ml</span>
      </div>
    </div>  
  </div>
  
  <div class="row">
    <div class="span2">
      <label>Frequency</label>
      <div class="input-append">
      <input name="rx_freq" type="number" id="rx_freq" value="<?=$db_baby_rx->get_rx_freq();?>"><span class="add-on"> hours</span>
      </div>
    </div>  
  </div>
  
  
  <? if($_GET["do"]=="delete"){?>
          <input type="submit" name="Submit" value="Click to delete this record.">
          <?
  }else if($_GET["do"]=="insert"){
  ?>
          <input type="submit" name="Submit" value="Click to insert this record">
          <?
  }
  else
  {
  ?>
          <input type="submit" name="Submit" value="Click to save these changes">
          <?
  }
  ?>
      <input name="do" type="hidden" id="do" value="<?=$_GET["do"]?>_exec">
      <input name="id" type="hidden" id="id" value="<?=$_GET["id"]?>">
      <input name="val_varchar" type="hidden" id="val_varchar" value="rx_name,">
      <input name="val_int" type="hidden" id="val_int" value="">
  
</form>
<?
$db_baby_rx->close();
?>