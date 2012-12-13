<?

// START CORE CLASS
// To allow future updates, do not change the code between the 
// START and END CORE lines
// ######################################################################
// class for baby_users table
// Built with ClassBuilder by Mauricio Giraldo Mutis <me@bymurdock.com>
// http://www.bymurdock.com
// This class was built on: 11/13/2012 10:11:23
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
class baby_users extends conDb {

  var $user_id;
  var $user_email;
  var $user_password;
  var $user_status;
  var $user_name;
  var $user_type;
  var $user_token;
  // ######################################################################
  // Class specific variables
  // ######################################################################
  var $tableName = "baby_users";
  var $idName = "user_id";

  // ######################################################################
  // User defined functions
  // ######################################################################
  // END CORE CLASS
  // Use the next lines to insert your own functions
  
  public function register() {
    $this->loadParams();
    $token = $this->seed(40);
    $this->set_user_token($token);
    $this->sql = "SELECT * FROM baby_users WHERE user_email = '" . $_POST["user_email"] . "'";
    $this->query();
    if ($this->load())
      print "FALSE ";
    else {
      $this->insertOne();
      $this->welcomeEmail($_POST["use_email"], $token);
      print "TRUE ";
    }
  }


  
  // Login
  public function login($username, $password, $type = 2) {
    $crypttext = crypt($password, "$2a$07$escorts$");
    $crypttext = htmlentities($password);
    $this->sql = "SELECT * from baby_users WHERE user_email = '" . htmlentities($username) . "' AND user_password = '" . $crypttext . "' AND user_status = 1 AND user_type = " . $type;
    $this->query();

    if ($this->load()) {
      $_SESSION["id_user"] = $this->field->user_id;
      $_SESSION["name"] = $this->field->user_name;
      $_SESSION["email"] = $username;
      $_SESSION["type"] = $this->field->user_type;
      return true;
    }
    else
      return false;
  }

  public function getDoctorsBabies()
  {
    $this->sql = "SELECT * FROM baby_relationships, baby_babies WHERE baby_id = rel_baby AND rel_user = ".$_SESSION["id_user"]." AND rel_type = 2 AND baby_status = 1";
    $this->query();
  }
  
  public function getParentBabies()
  {
    $this->sql = "SELECT * FROM baby_relationships, baby_babies WHERE baby_id = rel_baby AND rel_user = ".$_SESSION["id_user"]." AND rel_type = 3 AND baby_status = 1";
    $this->query();
  }
  
  public function welcomeEmail($email, $code) {
    $template = "<div><h2>Welcome to Follow App</h2><p>To finish your registration form, please click in the following link:<p/><p><a href=\"" . PORTAL_URL . "verify.php?vip=" . $code . "\">Click here!</a></p></div>";
    $mail = new sendmail();
    $mail->to = $email;
    $mail->from = PORTAL_MAIL;
    $mail->subject = "Welcome to " . PORTAL_NAME;
    $mail->body = $template;
    $mail->sendMail();
  }
  
  public function verify($code)
  {
    $this->sql = "SELECT * FROM baby_users WHERE user_token = '".$code."'";
    $this->query();
    if($this->load())
    {
      $this->sql = "UPDATE baby_users SET user_status = 1 WHERE user_token = '".$code."'";
      $this->query();
      return true;
    }
    else return false;
  }

}

?>