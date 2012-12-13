
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




    <p class="lead">

      <?
      if($_GET["m"] == 2)
      {
      ?>
      Registration successful.
      <?
      }
      if ($_GET["m"] == 3) {
        ?>
        Code not recognized.
        <?
      }
      ?>
    </p>

    <a href="index.php?load=welcome" class="btn">Home</a>
    
  </div>


  <div id="push"></div>
</div>

