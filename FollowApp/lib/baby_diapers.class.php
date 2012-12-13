<?
// START CORE CLASS
// To allow future updates, do not change the code between the 
// START and END CORE lines
// ######################################################################
// class for baby_diapers table
// Built with ClassBuilder by Mauricio Giraldo Mutis <me@bymurdock.com>
// http://www.bymurdock.com
// This class was built on: 11/10/2012 06:11:13
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
class baby_diapers extends conDb{
	var $diaper_id;
	var $diaper_baby;
	var $diaper_date;
	var $diaper_1;
	var $diaper_2;
	var $diaper_weight;
	// ######################################################################
	// Class specific variables
	// ######################################################################
	var $tableName = "baby_diapers";
	var $idName = "diaper_id";
	// ######################################################################
	// User defined functions
	// ######################################################################
	// END CORE CLASS
	// Use the next lines to insert your own functions
    
    public function diapersCount()
    {
      $this->sql = "SELECT COUNT(*) as counter FROM baby_diapers WHERE day(diaper_date) = ".date("d")." AND month(diaper_date) = ".date("m")." AND year(diaper_date) = ".date("Y");
      $this->query();
      $this->load();
      print $this->field->counter." diapers today <a href=\"index.php?load=diapers.quick\" class=\"btn btn-small btn-success\">Quick Entry</a>";
    }
}
?>