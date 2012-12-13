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
if ($return) header("Location: baby_feedings.list.php");
if ($_GET["do"]=="edit" || $_GET["do"]=="delete"){
	$db_baby_feedings->getOne($_GET["id"]);
	$db_baby_feedings->load();
}
?>
<script language="javascript" src="js/main.js"></script>
<form action="baby_feedings.do.php" method="post" name="do_baby_feedings" id="do_baby_feedings" onSubmit="return validate_types(this);">
  <table width="100%"  border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td>feed_date</td>
      <td><input name="feed_date" type="text" id="feed_date" value="<?=$db_baby_feedings->get_feed_date();?>" maxlength="atetim"></td>
    </tr>
    <tr>
      <td>feed_qty</td>
      <td><input name="feed_qty" type="text" id="feed_qty" value="<?=$db_baby_feedings->get_feed_qty();?>" maxlength="oubl"></td>
    </tr>
    <tr>
      <td>feed_xtra</td>
      <td><input name="feed_xtra" type="text" id="feed_xtra" value="<?=$db_baby_feedings->get_feed_xtra();?>" maxlength="oubl"></td>
    </tr>
    <tr>
      <td> </td>
      <td>
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
      <input name="val_varchar" type="hidden" id="val_varchar" value="">
      <input name="val_int" type="hidden" id="val_int" value=""></td>
    </tr>
  </table>
</form>
<?
$db_baby_feedings->close();
?>