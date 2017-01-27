<?php namespace PrivCode\Database;

defined('ROOT_DIR') or die('Forbidden');

use PrivCode\App\Config\Config;

class Database extends Config
{
    public function __construct()
    {
        parent::__construct();
        eval('$this->db = new PrivCode\Database\\Drivers\\'.$this->getConfigItem('database', 'driver').";");
        return $this->db;
    }

    public function database($hostname = false, $username = false, $password = false, $database = false)
    {
        if (!$hostname && !$username && !$password && !$database) {
            $hostname = $this->getConfigItem('database', 'hostname');
            $username = $this->getConfigItem('database', 'username');
            $password = $this->getConfigItem('database', 'password');
            $database = $this->getConfigItem('database', 'database');
        }
        
        $this->db->connect($hostname, $username, $password, $database);
    }
}

/* End of file Database.php */
/* Location: ./System/Database/Database.php */
