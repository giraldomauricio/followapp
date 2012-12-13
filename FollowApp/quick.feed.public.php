<?
if($_GET["add"] == "true")
{
  $feed = new baby_feedings();
  $feed->set_feed_date(date("Y-m-d H:i:s"));
  $feed->set_feed_qty($_POST["feed_qty"]);
  $feed->set_feed_xtra($_POST["feed_xtra"]);
  $feed->set_feed_baby($_SESSION["baby"]);
  $feed->insertOne();
  jsheader("index.php?token=".$_GET["token"]);
}
?>
<form id="quickFeeding" name="quickFeeding" method="post" action="index.php?load=quick.feed&add=true&token=<?=$_GET["token"]?>">
<h2>Feeding now.</h2>
<h3><?=date("g:i a")?></h3>

<div class="row">
    <div class="span2">
      <label>Qty in ml</label>
      <div class="input-append">
      <input class="span2" name="feed_qty" type="number" id="feed_qty" value=""><span class="add-on"> ml</span>
      </div>
    </div>  
  </div>
  
  <div class="row">
    <div class="span1">
      <label>Xtra in Cal</label>
      <div class="input-append">
      <input class="span2" name="feed_xtra" type="number" id="feed_xtra" value=""><span class="add-on"> Cal</span>
      </div>
    </div>  
  </div>

<h4>Are you sure you want to quick entry this feeding?</h4>
  <input type="submit" name="submit" id="submit" value="Yes" class="btn btn-large btn-success" /> 
  |
  <a href="index.php" class="btn btn-large  btn-danger">No</a>
</form>