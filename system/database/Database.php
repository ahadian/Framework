<?php
//defined('DIR_ROOT') or die('Forbidden.');

class Database extends Config {
	public $flag = MYSQLI_ASSOC;

	public function __construct(){
		$this->load(array('database'));
	}

	public function connection($hostname = false, $username = false, $password = false, $database = false){
		
		if(!$hostname && !$username && !$password && !$database){
			$hostname = $this->item('database', 'hostname');
			$username = $this->item('database', 'username');
			$password = $this->item('database', 'password');
			$database = $this->item('database', 'database');
		}

		$this->connection = mysqli_connect($hostname, $username, $password, $database) or error(mysqli_connect_error(), 'Error open connection', true);
	}

	public function real_escape($data){
		return mysqli_real_escape_string($this->connection, $data);
	}

	public function escape($data){
		return mysqli_escape_string($this->connection, $data);
	}
	
	public function query($query = '', $id = 0){
		$this->query[$id] = mysqli_query($this->connection, $query) or error(mysqli_error($this->connection), 'Error executing query', true);
		return $this->query[$id];
	}

	public function fetchAll($id = 0){
		if(isset($this->query[$id]) && !empty($this->query[$id])){
			$result = array();
			while ($row = $this->fetchObject($id)) {
				$result[] = $row;
			}
			return $result;
		}
	}

	public function fetchObject($id = 0){
		if(isset($this->query[$id]) && !empty($this->query[$id])){
			return mysqli_fetch_object($this->query[$id]);
		}
	}

	public function fetchArray($id = 0){
		if(isset($this->query[$id]) && !empty($this->query[$id])){
			return mysqli_fetch_array($this->query[$id], $this->flag);
		}
	}

	public function numRows($id){
		if (isset($this->query[$id]) && !(empty($this->query[$id]))) {
            return mysqli_num_rows($this->query[$id]);
        }
	}

	public function set_charset($charset = false){
        if (isset($this->connection) && !(empty($this->connection))) {
        	if(!$charset){
        		$charset = $this['database']['charset'];
        	}
            return mysqli_set_charset($this->connection, $charset) or error(mysqli_error($this->connection), 'Error set charset'.$charset, true);
        }
    }

    public function close(){
    	if (isset($this->connection) && !(empty($this->connection))) {
        	return mysqli_close($this->connection);
        }
    }
}
