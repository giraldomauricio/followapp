
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
        <p class="lead">Select the Baby to track</p>
      </div>
      <?
      $babies = new baby_users();
      $baby = new baby_babies();
      if($_GET["do"] == "remove")
      {
        $baby->removeBaby($_GET["baby"]);
      }
      $babies->getParentBabies();
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
        <hr/>
      <?
      }
      ?>
      <hr/>
      <div class="container">

        <a href="index.php?load=babies.do&do=insert" class="btn btn-large btn-success">Add Baby</a>

    </div>
      <div id="push"></div>
    </div>
    <script>
      function removeBaby(baby)
      {
        if(confirm("Are you sure you want to remove this baby from the tracking?"))
          {
            window.location = "index.php?load=babies&do=remove&baby=" + baby;
          }
      }
    </script>
  