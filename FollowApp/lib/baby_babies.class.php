<?
// START CORE CLASS
// To allow future updates, do not change the code between the 
// START and END CORE lines
// ######################################################################
// class for baby_babies table
// Built with ClassBuilder by Mauricio Giraldo Mutis <me@bymurdock.com>
// http://www.bymurdock.com
// This class was built on: 11/12/2012 05:11:28
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
class baby_babies extends conDb{
	var $baby_id;
	var $baby_name;
	var $baby_last;
	var $baby_dob;
	var $baby_sex;
	var $baby_token;
    var $baby_status;
	// ######################################################################
	// Class specific variables
	// ######################################################################
	var $tableName = "baby_babies";
	var $idName = "baby_id";
	// ######################################################################
	// User defined functions
	// ######################################################################
	// END CORE CLASS
	// Use the next lines to insert your own functions
    
    public function getBabyByToken($token)
    {
      $this->sql = "SELECT * FROM baby_babies WHERE baby_token = '".  htmlentities($token)."'";
      $this->query();
      if($this->load())
      {
        $_SESSION["baby"] = $this->field->baby_id;
        $_SESSION["name"] = $this->field->baby_name;
      }
      // STG
        $_SESSION["baby"] = 1;
        $_SESSION["name"] = "Chloe";
      //else jsheader("index.php?load=loghin");
    }
    
    public function removeBaby($baby)
    {
      $this->sql = "UPDATE baby_babies SET baby_status = 0 WHERE baby_id = ".$baby;
      $this->query();
    }
    
    public function getAllActive() {
      $this->sql = "SELECT * FROM baby_babies WHERE baby_status = 1";
      $this->query();
    }
}
?>