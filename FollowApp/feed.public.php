<?
// ######################################################################
// list for baby_feedings table
// Built with ListBuilder by Mauricio Giraldo Mutis
// http://www.bymurdock.com
// This class was built on: 11/09/2012 10:11:52
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
$db_baby_feedings = new baby_feedings;
$db_baby_feedings->listAll();
?>
<table width="100%"  border="0" cellspacing="1" cellpadding="1" class="table table-condensed table-striped table-bordered">
  <tr id="listInsert">
    <td colspan="5"><a href="index.php?load=feed.do&do=insert&token=<?=$_GET["token"]?>" class="btn btn-info btn-large">Add feeding <i class="icon-plus icon-white"></i></a></td>
  </tr>
  <tr id="listHeader">
    <td>Date</td>
    <td>Qty</td>
    <td>Xtra</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
  <? while($db_baby_feedings->load()){?>
  <tr id="listRow">
    <td><?=date("g:i a",strtotime($db_baby_feedings->get_feed_date()))?></td>
    <td><?=$db_baby_feedings->get_feed_qty()?></td>
    <td><?=$db_baby_feedings->get_feed_xtra()?></td>
    <td><a href="index.php?load=feed.do&do=edit&id=<?=$db_baby_feedings->get_feed_id()?>&token=<?=$_GET["token"]?>" class="btn btn-info btn-info"><i class="icon-edit icon-white"></a></td>
    <td><a href="index.php?load=feed.do&do=delete&id=<?=$db_baby_feedings->get_feed_id()?>&token=<?=$_GET["token"]?>" class="btn btn-danger"><i class="icon-trash icon-white"></a></td>
  </tr>
  <? }?>
</table>
<?
$db_baby_feedings->close()?>
