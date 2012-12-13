<?
// ######################################################################
// list for baby_rx_log table
// Built with ListBuilder by Mauricio Giraldo Mutis
// http://www.bymurdock.com
// This class was built on: 11/09/2012 11:11:34
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
$db_baby_rx_log = new baby_rx_log;
$db_baby_rx_log->listAll($_GET["rx"]);
?>
<table width="100%"  border="0" cellspacing="1" cellpadding="1" class="table table-condensed table-striped table-bordered">
  <tr id="listInsert">
    <td colspan="5"><a href="index.php?load=rx&token=<?=$_GET["token"]?>" class="btn btn-info btn-large">Rx List <i class="icon-th-list icon-white"></a></td>
  </tr>
  <tr id="listInsert">
    <td colspan="5"><a href="index.php?load=rxlog.do&do=insert&token=<?=$_GET["token"]?>" class="btn btn-info btn-large">ADD ENTRY <i class="icon-plus icon-white"></i></a></td>
  </tr>
  <tr id="listHeader">
    <td>Rx</td>
    <td>Status</td>
    <td>Time</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
  <?
  while($db_baby_rx_log->load()){
    if($db_baby_rx_log->get_rxlog_delivered() == 0) $class = "text-warning";
    if($db_baby_rx_log->get_rxlog_delivered() == 1) $class = "text-success";
    ?>
  <tr id="listRow" class="<?=$class?>">
    <td><?=$db_baby_rx_log->get_rx_name()?></td>
    <td><?=$db_baby_rx_log->statusDisplay($db_baby_rx_log->get_rxlog_delivered())?></td>
    <td><?=date("g:i a",strtotime($db_baby_rx_log->get_rxlog_real()))?></td>
    <td><a href="index.php?load=rxlog.do&do=edit&id=<?=$db_baby_rx_log->get_rxlog_id()?>&token=<?=$_GET["token"]?>" class="btn btn-info"><i class="icon-edit icon-white"></a></td>
    <td><a href="index.php?load=rxlog.do&do=delete&id=<?=$db_baby_rx_log->get_rxlog_id()?>&token=<?=$_GET["token"]?>" class="btn btn-danger"><i class="icon-trash icon-white"></a></td>
  </tr>
  <? }?>
</table>
<?
$db_baby_rx_log->close()?>
