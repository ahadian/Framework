<?php namespace PrivCode\Config;

defined('ROOT_DIR') or die('Forbidden');

/**
 * Config Class
 *
 * This class contains functions that enable config files to be managed
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Libraries
 * @author      EllisLab Dev Team
 * @link        https://codeigniter.com/user_guide/libraries/config.html
 */
class Config
{
 
    /**
     * Class constructor
     *
     * Sets the config data from the primary Config.php file as a class variable.
     *
     * @return  void
     */
    public function __construct()
    {
        if (empty($this->getConfigItem('url'))) {
            if (isset($_SERVER['SERVER_ADDR'])) {
                if (strpos($_SERVER['SERVER_ADDR'], ':') !== false) {
                    $address = '['.$_SERVER['SERVER_ADDR'].']';
                } else {
                    $address = $_SERVER['SERVER_ADDR'];
                }
                $this->baseurl = (https() ? 'https' : 'http').'://'.$address.substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
            } else {
                $this->baseurl = 'http://localhost/';
            }
            $this->setConfigItem('url', $this->baseurl);
        }
    }

    /**
     * Fetch a config file item
     *
     * @param   string  $item   Config item name
     * @param   string  $index  Index name
     * @return  string|null The configuration item or NULL if the item doesn't exist
     */
    public function getConfigItem($key, $index = '')
    {
        if ($index === '') {
            return isset($this->config[$key]) ? $this->config[$key] : null;
        }

        return isset($this->config[$key][$index]) ? $this->config[$key][$index] : null;
    }

    /**
     * Set a config file item
     *
     * @param   string  $item   Config item key
     * @param   string  $value  Config item value
     * @return  void
     */
    public function setConfigItem($key, $value)
    {
        $this->config[$key] = $value;
        return $this->config;
    }
    
}

/* End of file Config.php */
/* Location: ./System/Config/Config.php */