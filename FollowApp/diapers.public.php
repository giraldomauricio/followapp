<?
// ######################################################################
// list for baby_diapers table
// Built with ListBuilder by Mauricio Giraldo Mutis
// http://www.bymurdock.com
// This class was built on: 11/10/2012 06:11:29
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
$db_baby_diapers = new baby_diapers;
$db_baby_diapers->getAll();
?>
<table width="100%"  border="0" cellspacing="1" cellpadding="1" class="table table-condensed table-striped table-bordered">
  <tr id="listInsert">
    <td colspan="7"><a href="index.php?load=diapers.do&do=insert&token=<?=$_GET["token"]?>" class="btn btn-info btn-large">Add diaper change <i class="icon-plus icon-white"></i></a></td>
  </tr>
 
  <tr id="listHeader">
    <td>Date</td>
    <td>Pee</td>
    <td>Poop</td>
    <td>Weight</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
  <? while($db_baby_diapers->load()){?>
  <tr id="listRow">
    <td><?=date("g:i a",strtotime($db_baby_diapers->get_diaper_date()))?></td>
    <td><? if($db_baby_diapers->get_diaper_1()==1) print "Yes"?></td>
    <td><? if($db_baby_diapers->get_diaper_2()==1) print "Yes"?></td>
    <td><?=$db_baby_diapers->get_diaper_weight()?></td>
    <td><a href="index.php?load=diapers.do&do=edit&id=<?=$db_baby_diapers->get_diaper_id()?>&token=<?=$_GET["token"]?>" class="btn btn-info"><i class="icon-edit icon-white"></i></a></td>
    <td><a href="index.php?load=diapers.do&do=delete&id=<?=$db_baby_diapers->get_diaper_id()?>&token=<?=$_GET["token"]?>" class="btn btn-danger"><i class="icon-trash icon-white"></i></a></td>
  </tr>
  <? }?>
</table>
<?
$db_baby_diapers->close()?>
