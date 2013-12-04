<?php 

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root'); //set DB_PASS as 'root' if you're using MAMP
define('DB_DATABASE', 'seattle_ajax_basic');

class Database
{
	public $db;

	function __construct()
	{
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
		if ($this->db->connect_error){
			die('Could not connect to the database host (please double check the settings in connection.php): ' . $db->connect_error);
		}
	}

	//fetches all records from the query and returns an array with the fetched records
	public function fetch_all($query)
	{
		// global $db;
		$data = array();

		$result = $this->db->query($query);
		while($row = $result->fetch_assoc())
		{
			$data[] = $row;
		}
		return $data;
	}

	//fetch the first record obtained from the query
	public function fetch_record($query)
	{
		$result = $this->db->query($query);
		return $result->fetch_assoc();
	}
}

$database = new Database();

?>