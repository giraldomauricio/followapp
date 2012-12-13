<?
// START CORE CLASS
// To allow future updates, do not change the code between the 
// START and END CORE lines
// ######################################################################
// class for baby_rx_log table
// Built with ClassBuilder by Mauricio Giraldo Mutis <me@bymurdock.com>
// http://www.bymurdock.com
// This class was built on: 11/09/2012 11:11:23
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
class baby_rx_log extends conDb{
	var $rxlog_id;
	var $rxlog_baby;
	var $rxlog_rx;
	var $rxlog_date;
	var $rxlog_real;
	var $rxlog_delivered;
	var $rxlog_skipped;
	// ######################################################################
	// Class specific variables
	// ######################################################################
	var $tableName = "baby_rx_log";
	var $idName = "rxlog_id";
	// ######################################################################
	// User defined functions
	// ######################################################################
	// END CORE CLASS
	// Use the next lines to insert your own functions
    
    public function listAll($rx = 0)
    {
      if($rx) $this->sql = "SELECT * FROM baby_rx_log, baby_rx WHERE rx_id = rxlog_rx AND rx_id = ".$rx." ORDER BY rxlog_date DESC";
      else $this->sql = "SELECT * FROM baby_rx_log, baby_rx WHERE rx_id = rxlog_rx ORDER BY rxlog_date DESC";
      $this->query();
    }
    
    public function updateNext($rx)
    {
      $this->sql = "SELECT MAX(DATE_ADD(rxlog_real, INTERVAL rx_freq HOUR)) as rxNext FROM baby_rx_log, baby_rx WHERE rxlog_rx = rx_id AND rx_id = ".$rx." AND rxlog_baby = ".$_SESSION["baby"];
      
      $this->query();
      
      $this->load();
      $next = $this->field->rxNext;
      $this->sql = "UPDATE baby_rx_log SET rxlog_date = '".$next."', rxlog_real = '".$next."' WHERE rxlog_rx = ".$rx." AND rxlog_delivered = 0 AND rxlog_baby = ".$_SESSION["baby"];
      $this->query();
    }
}
?>