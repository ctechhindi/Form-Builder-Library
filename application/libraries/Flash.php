<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| Flash (v0.0.1)
| -------------------------------------------------------------------
| Codeigniter Flash Message Show
|
|   $this->flash->show(); // use view
|
|-----------------------------------------
|  Create new flash key and file look like
|   1. add new flash key (demo)
|   2. create demo.php in this folder application\views\Layout\Flash\demo.php)
*/

class Flash
{
    /**
     * Set Flash Keys
     */
    protected $flash_keys = [
        'success',
        'error',
        'warning',
    ];

    public function __construct()
	{
		$this->CI =& get_instance();
    }

    /**
     * Show Flash Session Data
     * @param: flash keys
     */
    public function show()
    {
        if(is_array($this->flash_keys) AND !empty($this->flash_keys))
        {
            foreach ($this->flash_keys as $flash_key) 
            {
                // Flash Message Store in this variable using flash keys
                $flash_msg = $this->CI->session->flashdata($flash_key);
                
                /**
                 * Check Flash Key Layout Exist in path
                 * @param: url : FCPATH.'application/views/Layout/Flash/_setLayout.php
                 */
                if(file_exists(FCPATH.'application/views/Layout/Flash/'.$flash_key.'.php')) 
                {
                    if(!empty($flash_msg))
                        $this->CI->load->view('../views/Layout/Flash/'.$flash_key, ['flash_msg' => $flash_msg]);
                }
            }
        }
    }
}