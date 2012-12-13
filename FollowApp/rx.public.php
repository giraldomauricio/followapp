<?
// ######################################################################
// list for baby_rx table
// Built with ListBuilder by Mauricio Giraldo Mutis
// http://www.bymurdock.com
// This class was built on: 11/09/2012 11:11:10
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
$db_baby_rx = new baby_rx;
$db_baby_rx->getAll();
?>
<table width="100%"  border="0" cellspacing="1" cellpadding="1" class="table table-condensed table-striped table-bordered">
  <tr id="listInsert">
    <td colspan="6"><a href="index.php?load=rx.do&do=insert&token=<?=$_GET["token"]?>" class="btn btn-info btn-large">ADD Rx <i class="icon-plus icon-white"></i></a></td>
  </tr>
  <tr id="listHeader">
    <td>Name</td>
    <td>Qty</td>
    <td>Freq</td>
    <td>Status</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
  <? while($db_baby_rx->load()){?>
  <tr id="listRow">
    <td><?=$db_baby_rx->get_rx_name()?></td>
    <td><?=$db_baby_rx->get_rx_qty()?></td>
    <td><?=$db_baby_rx->get_rx_freq()?></td>
    <td>
          <?
          if($db_baby_rx->get_rx_status()==1) print "Active";
          else print "Susp.";
          ?>
    </td>
    <td><a href="index.php?load=rx.do&do=edit&id=<?=$db_baby_rx->get_rx_id()?>&token=<?=$_GET["token"]?>" class="btn btn-info"><i class="icon-edit icon-white"></a></td>
    <td><a href="index.php?load=rx.do&do=delete&id=<?=$db_baby_rx->get_rx_id()?>&token=<?=$_GET["token"]?>" class="btn btn-danger"><i class="icon-trash icon-white"></a></td>
  </tr>
  <? }?>
</table>
<?
$db_baby_rx->close()?>
