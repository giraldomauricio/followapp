<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<div class="container">

  <h2><?= $_SESSION["name"] ?></h2>

  <div class="row">

    <div class="span4">
      <h3>Weight Log</h3> 
      <?
      $db_baby_weight_log = new baby_weight_log;
      $db_baby_weight_log->listAll();

      $chart = array();
      while ($db_baby_weight_log->load()) {
        array_push($chart, "['" . date("m/d", strtotime($db_baby_weight_log->get_w_date())) . "'," . $db_baby_weight_log->get_w_weight() . "]");
      }
      $chart = array_reverse($chart);
      ?>

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
      <div id="chart_div" style="width: 450px; height: 200px;"></div>
    </div>

    <div class="span4">
      <h3>Feeding Log</h3> 

      <?
      $feedings = new baby_feedings();
      $feedings->listAll();
      $chart = array();
      while ($feedings->load()) {
        array_push($chart, "['" . date("h:i", strtotime($feedings->get_feed_date())) . "'," . $feedings->get_feed_qty() . "]");
      }
      //$chart = array_reverse($chart);
      ?>

      <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Date', 'Feed'],<?= implode(",", $chart) ?>
          ]);

          var options = {
            title: 'Feeding Log', legend:{position:'none'}
          };

          var chart = new google.visualization.LineChart(document.getElementById('feed_div'));
          chart.draw(data, options);
        }
      </script>
      <div id="feed_div" style="width: 550px; height: 200px;"></div>


    </div>

  </div>

  <div class="row">

    <div class="span6">
      <h3>Rx Log</h3> 

  
          <?
          $db_baby_rx_log = new baby_rx_log;
          $db_baby_rx_log->listAll($_GET["rx"]);
          ?>            

          <table width="100%"  border="0" cellspacing="1" cellpadding="1" class="table table-condensed table-striped table-bordered">
            <tr id="listHeader">
              <td>Rx</td>
              <td>Status</td>
              <td>Time</td>
            </tr>
            <?
            while ($db_baby_rx_log->load()) {
              if ($db_baby_rx_log->get_rxlog_delivered() == 0)
                $class = "text-warning";
              if ($db_baby_rx_log->get_rxlog_delivered() == 1)
                $class = "text-success";
              ?>
              <tr id="listRow" class="<?= $class ?>">
                <td><?= $db_baby_rx_log->get_rx_name() ?></td>
                <td><?= $db_baby_rx_log->statusDisplay($db_baby_rx_log->get_rxlog_delivered()) ?></td>
                <td><?= date("g:i a", strtotime($db_baby_rx_log->get_rxlog_real())) ?></td>
              </tr>
            <? } ?>
          </table>

  

    </div>


  </div>


</div>