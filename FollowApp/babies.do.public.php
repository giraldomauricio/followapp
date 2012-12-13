<?
// ######################################################################
// Edit Form for baby_babies table
// Built with ListBuilder by Mauricio Giraldo Mutis
// http://www.bymurdock.com
// This class was built on: 11/15/2012 11:11:01
// ClassBuilder classes requires ConDB v.1.1 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
$db_baby_babies = new baby_babies;
$return = false;
$db_baby_babies->loadParams();
if ($_POST["do"]=="edit_exec")
{
	$db_baby_babies->updateOne($_POST["id"]);
	$return = true;
}
if ($_POST["do"]=="insert_exec")
{
    $db_baby_babies->set_baby_token($db_baby_babies->seed(40));
	$db_baby_babies->insertOne();
    $baby = $db_baby_babies->getLastId();
    $db_baby_babies->sql = "INSERT INTO baby_relationships (rel_baby,rel_user,rel_type) VALUES (".$baby.",".$_SESSION["id_user"].",3)";
    $db_baby_babies->query();
	$return = true;
}
if ($_POST["do"]=="delete_exec")
{
	$db_baby_babies->deleteOne($_POST["id"]);
	$return = true;
}
if ($return) jsheader("Location: index.php?load=babies");
if ($_GET["do"]=="edit" || $_GET["do"]=="delete"){
	$db_baby_babies->getOne($_GET["id"]);
	$db_baby_babies->load();
}
?>
<style type="text/css">

  /* Sticky footer styles
  -------------------------------------------------- */

  html,
  body {
    height: 100%;
    /* The html and body elements cannot have any padding or margin. */
  }

  /* Wrapper for page content to push down footer */
  #wrap {
    min-height: 100%;
    height: auto !important;
    height: 100%;
    /* Negative indent footer by it's height */
    margin: 0 auto -60px;
  }

  /* Set the fixed height of the footer here */
  #push,
  #footer {
    height: 60px;
  }
  #footer {
    background-color: #f5f5f5;
  }

  /* Lastly, apply responsive CSS fixes as necessary */
  @media (max-width: 767px) {
    #footer {
      margin-left: -20px;
      margin-right: -20px;
      padding-left: 20px;
      padding-right: 20px;
    }
  }



  /* Custom page CSS
  -------------------------------------------------- */
  /* Not required for template or sticky footer method. */

  .container {
    width: auto;
    max-width: 680px;
  }
  .container .credit {
    margin: 20px 0;
  }


  .form-signin {
    max-width: 300px;
    padding: 19px 29px 29px;

    background-color: #fff;
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
    box-shadow: 0 1px 2px rgba(0,0,0,.05);
  }
  .form-signin .form-signin-heading,
  .form-signin .checkbox {
    margin-bottom: 10px;
  }
  .form-signin input[type="text"],
  .form-signin input[type="password"] {
    font-size: 16px;
    height: auto;
    margin-bottom: 15px;
    padding: 7px 9px;
  }

</style>


<!-- Part 1: Wrap all page content here -->
<div id="wrap">

  <!-- Begin page content -->
  <div class="container">
    <div class="page-header">
      <h1>Babies</h1>
    </div>

  </div>

  <hr/>
  <div class="container">

    <form action="index.php?load=babies.do" method="post" name="baby_do" id="baby_do" onSubmit="return validate_types(this);">

      <div class="row">
        <div class="span2">
          <label>Name</label>
          <input name="baby_name" type="text" id="baby_name" value="<?= $db_baby_babies->get_baby_name 	(); ?>" maxlength="80">
        </div>  
      </div>

      <div class="row">
        <div class="span2">
          <label>Last name</label>
          <div class="input-append">
            <input name="baby_last" type="text" id="baby_last" value="<?= $db_baby_babies->get_baby_last(); ?>">
          </div>
        </div>  
      </div>

      <div class="row">
        <div class="span2">
          <label>DOB</label>
          <div class="input-append">
            <input name="baby_dob" type="date" id="baby_dob" value="<?= $db_baby_babies->get_baby_dob(); ?>">
          </div>
        </div>  
      </div>

      <div class="row">
        <div class="span2">
          <label>Sex</label>
          <div class="input-append">
            <?
            $status = new utils();
            $status->custom = array("M" => "Male", "F" => "Female");
            print $status->renderCustom("baby_sex", $db_baby_babies->get_baby_sex ());
            ?>
          </div>
        </div>  
      </div>
      
      <div class="row">
        <div class="span2">
          <label>Units</label>
          <div class="input-append">
            <?
            $status = new utils();
            $status->custom = array(1 => "Lb.", 2 => "Kg.");
            print $status->renderCustom("baby_units", $db_baby_babies->get_rx_status());
            ?>
          </div>
        </div>  
      </div>

      <div class="row">
        <div class="span2">
          <label>Preferred feed method</label>
          <div class="input-append">
            <?
            $status = new utils();
            $status->custom = array(1 => "Breast milk", 2 => "Formula");
            print $status->renderCustom("baby_feed", $db_baby_babies->get_baby_feed());
            ?>
          </div>
        </div>  
      </div>
      
      <div class="row">
        <div class="span2">
          <label>Usual feeding frequency</label>
          <div class="input-append">
            <?
            $status = new utils();
            $status->custom = array(1,2,3,4,5,6,7,8,9,10,11,12);
            print $status->renderCustom("baby_feed_freq", $db_baby_babies->get_baby_feed_freq());
            ?>
          </div>
        </div>  
      </div>

      <? if ($_GET["do"] == "delete") { ?>
        <input type="submit" name="Submit" value="DELETE" class="btn btn-danger btn-large">
        <?
      } else if ($_GET["do"] == "insert") {
        ?>
        <input type="submit" name="Submit" value="ADD" class="btn btn-success btn-large">
        <?
      } else {
        ?>
        <input type="submit" name="Submit" value="SAVE" class="btn btn-info btn-large">
        <?
      }
      ?>
      <input name="do" type="hidden" id="do" value="<?= $_GET["do"] ?>_exec">
      <input name="id" type="hidden" id="id" value="<?= $_GET["id"] ?>">
      <input name="val_varchar" type="hidden" id="val_varchar" value="rx_name,">

    </form>

  </div>
  <div id="push"></div>
</div>

