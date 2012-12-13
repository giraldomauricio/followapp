<h3>
<?=$_SESSION["name"]?>
<?
$weight = new baby_weight_log();
print $weight->currentWeight()
?>
  <a href="index.php?load=weight.quick&token=<?=$_GET["token"]?>" class="btn btn-small btn-success">Quick Entry</a>
</h3>
<h4>Next feeding:</h4>
<h3>
<?
$feeding = new baby_feedings();
print $feeding->nextFeeding();
?>
  <a href="index.php?load=quick.feed&token=<?=$_GET["token"]?>" class="btn btn-small btn-success">Quick Entry</a>
</h3>
<h4>Next Rx:</h4>
<h5>
<?
$rx = new baby_rx();
print $rx->nextRx();
?>
</h5>
<a class="btn btn-info" href="index.php?token=<?=$_GET["token"]?>"><i class="icon-refresh icon-white"></i> Refresh Screen</a>