<?php namespace PrivCode;

defined('ROOT_DIR') or die('Forbidden');

/**
 * Base Model Class
 *
 * @package		Priv Code
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Supian M
 * @link		http://www.priv-code.com
 */
use PrivCode\Database\Database;

class BaseModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
}

/* End of file URI.php */
/* Location: ./System/URI/URI.php */