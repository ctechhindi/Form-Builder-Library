<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| SetLayout (v0.0.1)
| -------------------------------------------------------------------
| With this class you can set the layout of a user or home page.
| In the layout, you can set the menu content such as the Page Header Menu and Footer.
|
| -------------------------------------------------------------------
| Any Module Controller
| -------------------------------------------------------------------
|  
    $this->load->library('Set_layout');

    $this->set_layout->_home([
        'pageTitle'   => '',
        'pageContant' => 'login',
        'pageContantData' => ['data' => 'Other Model Data'],
    ]);

| -------------------------------------------------------------------
| Make new function and call this function in this Controller 
| -------------------------------------------------------------------

    public function _home($set = null)
    {
        $this->_configLayout($set, [
            'pageHeader' => '../views/_home/header',
            'pageMenu'   => '../views/_home/nav',
            'pageFooter' => '../views/_home/footer',
        ]);
    }
    
*/

class Set_layout 
{

    public function __construct()
	{
		$this->CI =& get_instance();
    }

    /**----------------------------------------------------------------------------
     * _configLayout :: System Function
     * @param: $set
     * @param: $options
     *-----------------------------------------------------------------*/
    private function _configLayout($set, $options = null)
    {
        // check $set in array and not empty
        if(is_array($set) AND !empty($set))
        {
            // page title
            if(isset($set['pageTitle']) AND !empty($set['pageTitle'])) 
            {
                $data['title'] = $set['pageTitle'];
            }else {
                // load codeigniter helper
                $this->CI->load->helper('url');
                // call uri_string() function and set page title
                $data['title'] = uri_string();
            }

            // page header
            if(isset($options['pageHeader']) AND !empty($options['pageHeader'])) {
                // load page header
                $this->CI->load->view($options['pageHeader'], $data);
            }
            
            // page menu
            if(isset($options['pageMenu']) AND !empty($options['pageMenu'])) {
                // load page navbar
                $this->CI->load->view($options['pageMenu']);
            }
            

            // load page main contant
            if(!empty($set['pageContant'])) {
                $this->CI->load->view($set['pageContant'], @$set['pageContantData']);
            }

            // page footer
            if(isset($options['pageFooter']) AND !empty($options['pageFooter'])) {
                // load page footer
                $this->CI->load->view($options['pageFooter']);
            }
            
        }else
        {
            // if $set is not array
            die('Please Set Page Contant and Page Title.(pageTitle,pageContant)');
        }
    }

    /**
     * set user define functions 
     */

    /**
     * Home Page Template Set
     * @param: contant- page main contant
     */
    public function _home($set = null)
    {
        $this->_configLayout($set, [
            'pageHeader' => '../views/_home/header',
            'pageMenu'   => '../views/_home/nav',
            'pageFooter' => '../views/_home/footer',
        ]);
    }

    
}
