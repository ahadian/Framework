<?php
defined('DIR_ROOT') or die('Forbidden.');

class Database {
	public $flag = MYSQLI_ASSOC;

	public function __construct(){
		$this->config['database'] = config_loader('database');

		$this->connection($this->config['database']);
	}

	private function connection($config = array()){
		$this->connection = mysqli_connect($config['hostname'], $config['username'], $config['password'], $config['database']) or error(mysqli_connect_error(), 'Error open connection', true);
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
        		$charset = $this->config['database']['charset'];
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
