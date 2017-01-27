<?php namespace PrivCode\URI;

defined('ROOT_DIR') or die('Forbidden');

/**
 * URI Class
 *
 * Parses URIs and determines routing
 *
 * @package		Priv Code
 * @subpackage	Libraries
 * @category	URI
 * @author		Supian M
 * @link		http://www.priv-code.com
 */

class URI
{

    /**
     * List of URI segments
     *
     * Starts at 1 instead of 0.
     *
     * @var	array
     */
    public $segment = array();

    /**
     * Fetch URI Segment
     *
     * @param	int	$n Index
     * @param	mixed		$no_result	What to return if the segment index is not found
     * @return	mixed
     */
    
    public function segment($segment = null)
    {
        $uri = str_replace($_SERVER['REQUEST_URI'], '', $_SERVER['SCRIPT_NAME']);
        if ($uri == 'index.php') {
            $uri = '';
        } else {
            $uri = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['REQUEST_URI']);
            $uri = preg_replace("|/*(.+?)/*$|", "\\1", str_replace("\\", "/", $uri));
            $uri = trim($uri, '/');
        }
        $this->segment = preg_split('[\\/]', $uri, 0, PREG_SPLIT_NO_EMPTY);

        return isset($segment) ? $this->segment[$segment] : $this->segment;
    }
}

/* End of file URI.php */
/* Location: ./System/URI/URI.php */
