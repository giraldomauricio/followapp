<?
// ######################################################################
// list for baby_weight_log table
// Built with ListBuilder by Mauricio Giraldo Mutis
// http://www.bymurdock.com
// This class was built on: 11/10/2012 12:11:15
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
$db_baby_weight_log = new baby_weight_log;
$db_baby_weight_log->listAll();
?>
<?
$chart = array();
while ($db_baby_weight_log->load()) {
  array_push($chart, "['" . date("m/d", strtotime($db_baby_weight_log->get_w_date())) . "'," . $db_baby_weight_log->get_w_weight() . "]");
}
$chart = array_reverse($chart);

$db_baby_weight_log->restart();
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Date', 'Weight'],<?= implode(",", $chart) ?>
    ]);

    var options = {
      title: 'Weight Log', legend:{position:'none'}
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>
<div id="chart_div" style="width: 300px; height: 200px;"></div>

<table width="100%"  border="0" cellspacing="1" cellpadding="1" class="table table-condensed table-striped table-bordered">
  <tr id="listInsert">
    <td colspan="4"><a href="index.php?load=weight.do&do=insert&token=<?= $_GET["token"] ?>" class="btn btn-info btn-large"><i class="icon-calendar icon-white"></i> Log weight...</a></td>
  </tr>
<tr id="listInsert">
    <td colspan="4">
      
      
      
    </td>
  </tr>
  <tr id="listHeader">
    <td>Date</td>
    <td>Weight</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
  <?
  $chart = array();
  while ($db_baby_weight_log->load()) {
    array_push($chart, "['" . date("m/d", strtotime($db_baby_weight_log->get_w_date())) . "'," . $db_baby_weight_log->get_w_weight() . "]");
    ?>
    <tr id="listRow">
      <td><?= date("d/m/y",strtotime($db_baby_weight_log->get_w_date()) )?></td>
      <td><?= $db_baby_weight_log->get_w_weight() ?></td>
      <td><a href="index.php?load=weight.do&do=edit&id=<?= $db_baby_weight_log->get_w_id() ?>&token=<?= $_GET["token"] ?>" class="btn btn-info"><i class="icon-edit icon-white"></a></td>
      <td><a href="index.php?load=weight.do&do=delete&id=<?= $db_baby_weight_log->get_w_id() ?>&token=<?= $_GET["token"] ?>" class="btn btn-danger"><i class="icon-trash icon-white"></a></td>
    </tr>
    <?
  }
  $chart = array_reverse($chart);
  ?>
</table>

<? $db_baby_weight_log->close() ?>
