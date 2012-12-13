<?
// START CORE CLASS
// To allow future updates, do not change the code between the 
// START and END CORE lines
// ######################################################################
// class for baby_feedings table
// Built with ClassBuilder by Mauricio Giraldo Mutis <me@bymurdock.com>
// http://www.bymurdock.com
// This class was built on: 11/09/2012 10:11:12
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
class baby_feedings extends conDb{
	var $feed_id;
	var $feed_baby;
	var $feed_date;
	var $feed_qty;
	var $feed_xtra;
	// ######################################################################
	// Class specific variables
	// ######################################################################
	var $tableName = "baby_feedings";
	var $idName = "feed_id";
	// ######################################################################
	// User defined functions
	// ######################################################################
	// END CORE CLASS
	// Use the next lines to insert your own functions
	
	public function listAll()
	{
		$this->sql = "SELECT * FROM baby_feedings ORDER BY feed_id ASC";
        $this->query();
	}
    
    public function nextFeeding()
    {
      $this->sql = "SELECT DATE_ADD(feed_date, INTERVAL 3 HOUR) as nextFeedingTime FROM baby_feedings WHERE feed_baby = ".$_SESSION["baby"]." ORDER BY feed_date DESC LIMIT 0,1";
      $this->query();
      $this->load();
      return "<i class=\"icon-tint\"></i> ".date("g:i a", strtotime($this->field->nextFeedingTime));
    }
}
?>