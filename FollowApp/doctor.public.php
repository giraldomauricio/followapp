
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

    </style>


    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
          <h1>Babies</h1>
        </div>
        <p class="lead">Select the Patient to track</p>
      </div>

      <?
      $babies = new baby_users();
      if($_POST["do"] == "add_exec")
      {
        $babies->sql = "SELECT COUNT(*) as counter FROM baby_relationships WHERE rel_baby = ".$_POST["baby"]." AND rel_user = ".$_SESSION["id_user"];
        $babies->query();
        $babies->load();
        if($babies->field->counter == 0)
        {
          $babies->sql = "INSERT INTO baby_relationships (rel_baby,rel_user,rel_type) VALUES (".$_POST["baby"].",".$_SESSION["id_user"].",2)";
          $babies->query();
        }
      }
      if($_GET["do"] == "remove")
      {
        $babies->sql = "DELETE FROM baby_relationships WHERE rel_baby = ".$_GET["baby"]." AND rel_user = ".$_SESSION["id_user"];
        $babies->query();
      }
      $babies->getDoctorsBabies();
      while($babies->load())
      {
      ?>
      
      <div class="row">
        
        <div class="span2">
          <a href="index.php?token=<?=$babies->get_baby_token()?>" class="btn btn-large btn-success">Open <?=$babies->get_baby_name()?></a>
        </div>
        <div class="span2">
          <a href="#" onclick="removeBaby(<?=$babies->get_baby_id()?>)" class="btn btn-large btn-danger">Remove <?=$babies->get_baby_name()?></a>
        </div>
        
      </div>
      <?
      }
      ?>
      <hr />
      <form action="index.php?load=doctor" method="post" name="baby_do" id="baby_do" onSubmit="return validate_types(this);">

      <div class="row">
        <div class="span2">
          <label>Add Baby</label>
          <?
          $babies = new baby_babies();
          $babies->getAllActive();
          print $babies->dropdown("baby", "baby_id", "baby_name", 0);
          ?>
        </div>  
      </div>

      
        <input type="submit" name="Submit" value="ADD" class="btn btn-success btn-large">
        
      <input name="do" type="hidden" id="do" value="add_exec">

    </form>
      <div id="push"></div>
    </div>

   <script>
      function removeBaby(baby)
      {
        if(confirm("Are you sure you want to remove this baby from the tracking?"))
          {
            window.location = "index.php?load=doctor&do=remove&baby=" + baby;
          }
      }
    </script>
  