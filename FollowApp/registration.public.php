<form name="do_registration" id="do_registration">
  
  <div class="row">
    <div class="span2">
      <label>Name</label>
      <input class="span3" name="user_name" type="text" id="user_name" value="">
    </div>  
  </div>
  
  <div class="row">
    <div class="span2">
      <label>Email</label>
      <input class="span3" name="user_email" type="email" id="user_email" value="">
    </div>  
  </div>
  
  <div class="row">
    <div class="span2">
      <label>Password</label>
      <input class="span3" name="user_password" type="text" id="user_password" value="">
    </div>  
  </div>
  
  <div class="row">
    <div class="span2">
      <label>Confirm password</label>
      <input class="span3" name="confirm_password" type="text" id="confirm_password" value="">
    </div>  
  </div>
  
  <div class="row">
    <div class="span1">
      <input type="button" name="Submit" value="REGISTER" class="btn btn-info btn-large" onclick="register()">
    </div>
  </div>
  
</form>

<script>

function register()
  {
    var msg = "";
    if(!$("#user_name").val()) msg += "Please type your name.\n";
    if(!$("#user_email").val()) msg += "Please type your email.\n";
    if(!$("#user_password").val()) msg += "Please type your password.\n";
    if($("#confirm_password").val() != $("#user_password").val()) msg += "Password and confirmation doesn't match";
    if(msg != "") alert(msg);
    else
    {
      $.ajax({
        type: "POST",
        url: "register.ajax.php",
        data: { user_name: $("#user_name").val(), user_email: $("#user_email").val(), user_password: $("#user_password").val() },
        cache: false
      }).success(function( msg ) {
        if(msg.substr(0,4) == "TRUE"){
          alert("Registration successful.\n\nPlease check your email to confirm your account.");
          //$("#regConfirm").show();
          //$('#regConfirm').modal('show')
          window.location = "index.php?load=welcome";
        }
        else alert("There was an error in the registration. Please try again.");
      });
    }
  }

</script>