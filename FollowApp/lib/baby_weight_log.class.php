<?
// START CORE CLASS
// To allow future updates, do not change the code between the 
// START and END CORE lines
// ######################################################################
// class for baby_weight_log table
// Built with ClassBuilder by Mauricio Giraldo Mutis <me@bymurdock.com>
// http://www.bymurdock.com
// This class was built on: 11/10/2012 12:11:13
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
class baby_weight_log extends conDb{
	var $w_id;
	var $w_baby;
	var $w_date;
	var $w_weight;
	// ######################################################################
	// Class specific variables
	// ######################################################################
	var $tableName = "baby_weight_log";
	var $idName = "w_id";
	// ######################################################################
	// User defined functions
	// ######################################################################
	// END CORE CLASS
	// Use the next lines to insert your own functions
    
    public function listAll()
	{
		$this->sql = "SELECT * FROM baby_weight_log ORDER BY w_date DESC";
        $this->query();
	}
    
    public function currentWeight()
	{
		$this->sql = "SELECT w_weight FROM baby_weight_log ORDER BY w_date DESC LIMIT 0,2";
        $this->query();
        $this->load();
        $now = $this->get_w_weight();
        $this->load();
        $before = $this->get_w_weight();
        if($now > $before) $icon = "<i class=\"icon-arrow-right\"></i>";
        if($now < $before) $icon = "<i class=\"icon-arrow-down\"></i>";
        if($now > $before) $icon = "<i class=\"icon-arrow-up\"></i>";
        return " (".$now." lb ".$icon.")";
	}
}
?>