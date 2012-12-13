<?
// START CORE CLASS
// To allow future updates, do not change the code between the 
// START and END CORE lines
// ######################################################################
// class for baby_rx table
// Built with ClassBuilder by Mauricio Giraldo Mutis <me@bymurdock.com>
// http://www.bymurdock.com
// This class was built on: 11/09/2012 11:11:21
// ClassBuilder classes requires ConDB v.2.0 or later
// Class builder is Open Source, but for copyright issues, please keep
// this copy on any class that uses it.
// (R) 2005-2012
// ######################################################################
class baby_rx extends conDb{
	var $rx_id;
	var $rx_baby;
	var $rx_name;
	var $rx_qty;
	var $rx_freq;
	var $rx_status;
	// ######################################################################
	// Class specific variables
	// ######################################################################
	var $tableName = "baby_rx";
	var $idName = "rx_id";
	// ######################################################################
	// User defined functions
	// ######################################################################
	// END CORE CLASS
	// Use the next lines to insert your own functions
    
    public function nextRx()
    {
      //$this->sql = "SELECT rx_id, rx_name, MAX(DATE_ADD(rxlog_date, INTERVAL rx_freq HOUR)) as rxNext FROM baby_rx_log, baby_rx WHERE rxlog_rx = rx_id AND DATE_ADD(rxlog_date, INTERVAL rx_freq HOUR) > now() GROUP BY rx_name ORDER By DATE_ADD(rxlog_date, INTERVAL rx_freq HOUR)";
      //$this->sql = "SELECT rx_id, rx_name, MAX(DATE_ADD(rxlog_date, INTERVAL rx_freq HOUR)) as rxNext FROM baby_rx_log, baby_rx WHERE rxlog_rx = rx_id GROUP BY rx_name ORDER By DATE_ADD(rxlog_date, INTERVAL rx_freq HOUR)";
      
      
      $return = "<table>";
      $this->sql = "SELECT rxlog_id, rx_id, rx_name, rxlog_date FROM baby_rx_log, baby_rx WHERE rxlog_rx = rx_id AND rxlog_delivered = 0 AND rxlog_date >= now() AND rx_status = 1 ORDER By rxlog_date ASC";
      $this->query();
      while($this->load())
      {
        $return .= "<tr class=\"text-success\"><td><i class=\"icon-leaf\"></i></td><td><a href=\"index.php?load=rxlog&rx=".$this->get_rx_id()."&token=".$_GET["token"]."\" class=\"btn btn-small btn-info\">".$this->get_rx_name()."</a></td><td>&raquo;</td><td>".date("g:i a",strtotime($this->get_rxlog_date()))."</td><td><a href=\"index.php?load=quick.rx&id=".$this->get_rx_id()."&log=".$this->get_rxlog_id()."&token=".$_GET["token"]."\" class=\"btn btn-small btn-success\">Quick Entry</a></td></tr>";
      }
      $this->sql = "SELECT rxlog_id, rx_id, rx_name, rxlog_date FROM baby_rx_log, baby_rx WHERE rxlog_rx = rx_id AND rxlog_delivered = 0 AND rxlog_date < now() AND rx_status = 1 ORDER By rxlog_date ASC";
      $this->query();
      while($this->load())
      {
        $return .= "<tr class=\"text-error\"><td><i class=\"icon-leaf\"></i></td><td><a href=\"index.php?load=rxlog&rx=".$this->get_rx_id()."&token=".$_GET["token"]."\" class=\"btn btn-small btn-info\">".$this->get_rx_name()."</a></td><td>&raquo;</td><td>".date("g:i a",strtotime($this->get_rxlog_date()))."</td><td><a href=\"index.php?load=quick.rx&id=".$this->get_rx_id()."&log=".$this->get_rxlog_id()."&token=".$_GET["token"]."\" class=\"btn btn-small btn-success\">Quick Entry</a></td></tr>";
      }
      $return .= "</table>";
      return $return;
    }
}
?>