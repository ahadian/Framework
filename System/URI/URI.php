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
        if (isset($_SERVER['REQUEST_URI'])) {
            $this->request = $_SERVER['REQUEST_URI'];
            $this->filterUri($this->request);
            $this->segment = explode(DIRECTORY_SEPARATOR, $this->request);
            return isset($segment) ? $this->segment[$segment] : $this->segment;
        }
    }

    /**
     * Filter URI
     *
     * Filters segments for malicious characters.
     *
     * @param   string  $str
     * @return  void
     */
    public function filterUri($str)
    {
        if (!empty($str) && stripos('~`$%^*(){}[]|:;"\'<,.>', urldecode($str))){
            show_error('The URI you submitted has disallowed characters.');
        }
    }
}

/* End of file URI.php */
/* Location: ./System/URI/URI.php */