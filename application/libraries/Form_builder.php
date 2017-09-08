<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Form Builder with Codeigniter
 * -----------------------------------------
 * There CSS Framework Support
 *  1. Bootstrap v4.0.0-beta
 *  2. Bootstrap v3.3.5
 *  3. Semantic v2.2.13
 * 
 * @package  : CodeIgniter
 * @author   : jeevan lal
 * @version  : 0.0.1
 * @link     : 
 * @license  : Open Source License
 *  
 */

 
class Form_builder {

    /**
     * Form Builder Default Theme
     */
    protected $theme = 'bootstrap3';

    /**
     * Form Builder Theme By Class and other informations
     */
    protected $theme_templates = [
        'bootstrap3' => [
            'group_class' =>  'form-group',
            'label_class' =>  'control-label',
            'input_class' => 'form-control',
            'input_error_class' => 'has-error',
            'requried_text' => '<span style="color:red;">(*)</span>',
            // only checkbox
            'check_checkbox_group_class' => 'checkbox',
            'check_checkbox_label_class' => 'control-label',
            'check_checkbox_input_class' => '',
            // only radio
            'check_radio_group_class' => 'radio',
            'check_radio_label_class' => 'control-label',
            'check_radio_input_class' => '',
            // field help text
            'help_text_class' => '',
            // inline radio and checkbox
            'inline_checkbox_label_class' => 'checkbox-inline',
            'inline_radio_label_class' => 'radio-inline',
        ],

        'bootstrap4' => [
            // input and textarea and dropdown and multiselect
            'group_class' =>  'form-group',
            'group_class' =>  'form-group',
            'label_class' =>  '',
            'input_class' => 'form-control',
            'input_error_class' => 'is-invalid',
            'requried_text' => '<span style="color:red;">(*)</span>',
            // only checkbox and radio
            'check_group_class' => 'form-check',
            'inline_check_group_class' => 'form-check-inline',
            'check_label_class' => 'form-check-label',
            'check_input_class' => 'form-check-input',
            // field help text
            'help_text_class' => 'form-text text-muted',
        ],

        'semantic2' => [
            'group_class' =>  'field',
            'label_class' =>  '',
            'input_class' => '',
            'input_error_class' => 'error',
            'requried_text' => '<span style="color:red;">(*)</span>',
            // only checkbox and radio
            'check_group_class' => '',
            'check_label_class' => '',
            'check_input_class' => '',
            // field help text
            'help_text_class' => '',
        ]
    ];
    
    /**
     * Field First Element like form_group or field
     */
    protected $group_exists = true;

    /**
     * Field Label Settings
     */
    protected $label_exists = false;
    protected $label_class_exists = false;
    protected $label_for_exists = false;

    /**
     * Input Field Settings
     */
    protected $input_name_exists = true;
    protected $input_id_exists = true;
    protected $input_class_exists = true;
    protected $input_placeholder_exists = FALSE;
    protected $input_required_exists = FALSE;

    /**
     * Checkbox Field Settings
     */
    protected $checkbox_class_exists = true;
    protected $checkbox_name_exists = true;
    protected $checkbox_id_exists = true;

    /**
     * Radio Field Settings
     */
    protected $radio_class_exists = true;
    protected $radio_name_exists = true;
    protected $radio_id_exists = true;
    
    /**
     * Field Help Text Settings
     */
    protected $help_text_exists = true;

    /**
     * Field Error Settings
     */
    protected $input_field_error_class = TRUE; // errors class
    protected $input_field_error_text = TRUE; // errors text


    /**
     *   $this->load->library('form_builder', 'login');
     * 
     * 'login' is form_builder config file array()
     */
	public function __construct($config_type) {
        $this->CI =& get_instance();
        // load codeigniter form helper
        $this->CI->load->helper('form');
        // set config file key
        $this->setKey($config_type);
    }
    
    /**
     * Set Key in setVar() Function
     * @param: form builder item key
     * @return: call setVar() function
     */
    private function setKey($ci_item)
    {
        /**
         * Load Form Builder Config File 
         */
        $this->CI->load->config('form_builder');
        
        $exists_key = $this->CI->config->item($ci_item);

        if($exists_key) {
            // key exists in config file
            $this->setVar($ci_item);
        }else {
            // key exists in config file
            $this->setVar('all');
        }
    }

    /**
     * Set Settings for form_builder config file
     * @param: form_builder config file item
     */
    private function setVar($key)
    {
        $key_data = $this->CI->config->item($key);

        if(!$key_data)
            die('Please create all array in config file');
        
        /**
         * Set Form Builder Theme
         * @default_theme : bootstrap3
         */
        if(isset($key_data['theme']) AND is_string($key_data['theme']))
        {
            if($key_data['theme'] == 'bootstrap3')
                $this->theme = 'bootstrap3';

            else if($key_data['theme'] == 'bootstrap4')
                $this->theme = 'bootstrap4';

            else if($key_data['theme'] == 'semantic2')
                $this->theme = 'semantic2';

            else
                $this->theme = 'bootstrap3';
        }

        // field label
        if(isset($key_data['label']) AND $key_data['label'] != FALSE)
            $this->label_exists = true;

        // field label class
        if(isset($key_data['label']['class']) AND $key_data['label']['class'] === TRUE)
            $this->label_class_exists = true;
        
        // field label for element
        if(isset($key_data['label']['for']) AND $key_data['label']['for'] === TRUE)
            $this->label_for_exists = true;

        // field class
        if(isset($key_data['class']) AND $key_data['class'] === FALSE)
            $this->input_class_exists = FALSE;
        
        // field name
        if(isset($key_data['name']) AND $key_data['name'] === FALSE)
            $this->input_name_exists = FALSE;
        
        // field id
        if(isset($key_data['id']) AND $key_data['id'] === FALSE)
            $this->input_id_exists = FALSE;

         // field placeholder
        if(isset($key_data['placeholder']) AND $key_data['placeholder'] === TRUE)
            $this->input_placeholder_exists = TRUE;

        // field required
        if(isset($key_data['required']) AND $key_data['required'] === TRUE)
            $this->input_required_exists = TRUE;

        // field error_text
        if(isset($key_data['error_text']) AND $key_data['error_text'] === FALSE)
            $this->input_field_error_text = FALSE;

        // field error_class
        if(isset($key_data['error_class']) AND $key_data['error_class'] === FALSE)
            $this->input_field_error_class = FALSE;

        // field group 
        if(isset($key_data['group']) AND $key_data['group'] === FALSE)
            $this->group_exists = FALSE;
    }

    /**
     * Form Fields ( text, password, hidden, number, textarea and other )
     * @param: field data in array
     */
    public function text(array $param)
    {
        $input = '';
        $input .= $this->field_group_start($param, 'input');

        $input .= $this->field_label_start($param, 'input');
        $input .= $this->field_label_end();

        /**
         * Set Field Properties this function
         */
        $input_param = $this->set_property($param);

        if(isset($param['type']) AND $param['type'] == 'textarea') {
            // Textarea Field
            $input .= form_textarea($input_param['input_data'], '', $input_param['input_other_elements']);
        }else if(isset($param['type']) AND $param['type'] == 'file')
        {
            // File Field
            $input .= form_upload($input_param['input_data'], '', $input_param['input_other_elements']);
        }
        else{
            // Other Fields
            $input .= form_input($input_param['input_data'], '', $input_param['input_other_elements']);
        }

        $input .= $this->field_error_text($param);
        $input .= $this->field_help_text($param);
        $input .= $this->field_group_end($param);
        echo $input;
    }

    /**
     * Form Select Fields ( Dropdown and Multiselect ) Element
     * @param: field data in array
     */
    public function select(array $param)
    {
        $select = '';
        $select .= $this->field_group_start($param, 'input');

        $select .= $this->field_label_start($param, 'input');
        $select .= $this->field_label_end();
        
        /**
         * Set Field Properties this function
         */
        $input_param = $this->set_property($param);

        if(isset($param['type']) AND $param['type'] == 'multi')
            $select .= form_multiselect($input_param['input_data'], @$param['options'], @$param['select'],  $input_param['input_other_elements']);
        else
            $select .= form_dropdown($input_param['input_data'], @$param['options'], @$param['select'],  $input_param['input_other_elements']);
        
        $select .= $this->field_error_text($param);
        $select .= $this->field_help_text($param);
        $select .= $this->field_group_end($param);
        echo $select;
    }

    /**
     * Form Checkbox
     * @param: field data in array
     */
    public function checkbox(array $param)
    {
        $checkbox = '';
        $checkbox .= $this->field_group_start($param, 'check','checkbox');
        $checkbox .= $this->field_label_start($param, 'check','checkbox');
        
        /**
         * Set Field Properties this function
         */
        $input_param = $this->set_property_checkbox($param);
        $checkbox .= form_checkbox($input_param['checkbox_data'], $input_param['checkbox_value'], $input_param['checked'], $input_param['other_data']);

        $checkbox .= @$param['text'];
        $checkbox .= $this->field_label_end();
        $checkbox .= $this->field_group_end($param);
        $checkbox .= $this->field_error_text($param);
        echo $checkbox;
    }

    /**
     * Form Radio
     * @param: field data in array
     */
    public function radio(array $param)
    {
        $radio = '';
        $radio .= $this->field_group_start($param, 'check','radio');
        $radio .= $this->field_label_start($param, 'check','radio');
        
        /**
         * Set Field Properties this function
         */
        $input_param = $this->set_property_radio($param);
        $radio .= form_radio($input_param['radio_data'], $input_param['radio_value'], $input_param['checked'], $input_param['other_data']);

        $radio .= @$param['text'];
        $radio .= $this->field_label_end();
        $radio .= $this->field_group_end($param);
        $radio .= $this->field_error_text($param);
        echo $radio;
    }

    /**
     * Show Field Error Class Status (TRUE/FALSE)
     * @param : field data
     * @return : boolean
     */
    private function field_error_class(array $param)
    {
        // config file array key ('error_text' => TRUE)
        if($this->input_field_error_class === TRUE)
        {
            if(!isset($param['error_class']) AND form_error(@$param['name']))        
                return true;
        }
        return false;
    }


    /**
     * Field Group OR Field Start
     * @param: field data
     * @return: field group with error class
     */
    public function field_group_start(array $param, $which_class, $which_html_el = FALSE)
    {
        /**
         * Check Group Exists in Config Key : TRUE
         */
        if($this->group_exists === FALSE)
            return false;

        if(isset($param['group']) AND $param['group'] === FALSE)
            return false;

        /**
         * Check Thems in Theme Template Variable
         */
        if (array_key_exists($this->theme, $this->theme_templates))
        {
            /**
             * Set Field Error Class
             * @param: bootstrap3 and semantic2
             */
            if($this->theme == "bootstrap3" AND $this->field_error_class($param) )
                $input_error_class = $this->theme_templates[$this->theme]['input_error_class'];

            if($this->theme == "semantic2" AND $this->field_error_class($param) )
                $input_error_class = $this->theme_templates[$this->theme]['input_error_class'];


            /**
             * Set Class For HTML Elements
             * 1. input => input and textarea and dropdown and multiselect
             * 2. check => only checkbox and radio
             */
            if($which_class == 'input')
            {
                $class = $this->theme_templates[$this->theme]['group_class'];

            }else if($which_class == 'check')
            {
                 /**
                * Set Class Bootstrap 3
                * 1. $which_html_el == 'checkbox'  => inline_checkbox_label_class
                * 2. $which_html_el == 'radio'     => inline_radio_label_class
                */
                if($this->theme == "bootstrap3" AND $which_html_el == "checkbox")
                    $class = $this->theme_templates[$this->theme]['check_checkbox_group_class'];
                
                else if($this->theme == "bootstrap3" AND $which_html_el == "radio")
                    $class = $this->theme_templates[$this->theme]['check_radio_group_class'];
                
                else
                    $class = $this->theme_templates[$this->theme]['check_group_class'];
            }
            
            /**
             * Set Inline Class
             * @rule: only for checkbox and radio
             */
            if($which_class == 'check' AND isset($param['inline']) AND $param['inline'] === TRUE)
            {
                    /**
                 * Set Class Bootstrap 4 Beta
                 */
                if($this->theme == "bootstrap4")
                    $inline_class = $this->theme_templates[$this->theme]['inline_check_group_class'];
            }

            // return data
            return '<div class="'.$class.' '.@$inline_class.' '.@$input_error_class.'">';
        }
    }

    /**
     * Field Group OR Field END
     */
    public function field_group_end(array $param)
    {
        /**
         * Check Group Exists in Config Key
         */
        if($this->group_exists === FALSE)
            return false;

        if(isset($param['group']) AND $param['group'] === FALSE)
            return false;

        return '</div>';
    }

    /**
     * Field Label Start
     * ---------------------------
     * label OR label => [] :: label not isset so show default label element 
     * label => false       :: not show label element
     * label => string      :: String label text
     * label => ['class'=> '','text' => '']
     * 
     * @param: field data in array
     * @param: which_class 
     * @param: which_html_el => Only For Bootstrap 3
     *   Set Class For HTML Elements
     *      1. input => input and textarea and dropdown and multiselect
     *      2. check => only checkbox and radio
     */
    public function field_label_start(array $param, $which_class, $which_html_el = FALSE)
    {
        /**
         * Check Label Exists in Config Key and field label status
         */
        // var_dump( (isset($param['label']) AND $param['label'] != FALSE ));exit;
        if($this->label_exists AND (!isset($param['label']) OR is_array($param['label']) OR is_string($param['label']) ))
        {
            /**
             * Label Class
             */
            if($this->label_class_exists) // TRUE
            {
                /**
                 * Set Inline Class
                 * @rule: only for checkbox and radio
                 */
                if($which_class == 'check' AND isset($param['inline']) AND $param['inline'] === TRUE)
                {
                    /**
                     * Set Class Bootstrap 3
                     * 1. $which_html_el == 'checkbox'  => inline_checkbox_label_class
                     * 2. $which_html_el == 'radio'     => inline_radio_label_class
                     */
                    if($this->theme == "bootstrap3" AND $which_html_el == "checkbox")
                        $inline_class = $this->theme_templates[$this->theme]['inline_checkbox_label_class'];

                    else if($this->theme == "bootstrap3" AND $which_html_el == "radio")
                        $inline_class = $this->theme_templates[$this->theme]['inline_radio_label_class'];
                }

                if($which_class == 'input')
                {
                    if(!isset($param['label']['class']))
                        $class = 'class="'.$this->theme_templates[$this->theme]['label_class'].'"';
                    else
                        $class = 'class="'.$param['label']['class'].'"';

                }else if($which_class == 'check')
                {
                    if($this->theme == "bootstrap3" AND $which_html_el == "checkbox")
                        $class = 'class="'.$this->theme_templates[$this->theme]['check_checkbox_label_class'].' '.@$inline_class.'"';

                    else if($this->theme == "bootstrap3" AND $which_html_el == "radio")
                        $class = 'class="'.$this->theme_templates[$this->theme]['check_radio_label_class'].' '.@$inline_class.'"';
                    
                    else
                        $class = 'class="'.$this->theme_templates[$this->theme]['check_label_class'].' '.@$inline_class.'"';
                }
            }

            /**
             * Label For Element
             */
            if($this->label_for_exists) // TRUE
            {
                if($which_class == 'input')
                {
                    $for = 'for="'.@$param['name'].'"';
                }
            }

            /**
             * Label Text
             */
            if($which_class == 'input')
            {
                if(!isset($param['label']['text']) AND !isset($param['label']))
                    $text = ucwords($param['name']);

                else if(isset($param['label']) AND is_string($param['label']))
                    $text = $param['label'];
                
                else if(isset($param['label']['text']))
                    $text = $param['label']['text'];
            }

            /**
             * Label Required Text
             */
            if($this->input_required_exists) // TRUE
            {
                if($which_class == 'input') 
                {
                    if(isset($param['required']) AND $param['required'] != FALSE) 
                        $requried = $this->theme_templates[$this->theme]['requried_text'];
                }
            }

            // return label
            return '<label '.@$class.' '.@$for.'>'.@$text.' '.@$requried;
        }
    }

    /**
     * Field Label End
     */
    public function field_label_end()
    {
        /**
         * Check Label Exists in Config Key
         */
        if($this->label_exists) // TRUE
            return '</label>';
    }

    /**
     * Field Set Properties
     * ---------------------------
     * 1. value
     * 2. class
     * 3. form_error_class
     * 4. type
     * 5. name
     * 6. id
     * 7. Placeholder
     * 8. Required
     * 9. maxlength
     * 10. Size
     * 11. style
     * 12. Other Elements
     * 13. disabled
     * 
     * @return: input_data
     * @return: input_other_elements
     */
    private function set_property(array $param)
    {
        $input_data = [];

        /**
         * Input Value
         */
        if(isset($param['value']))
            $input_data['value'] = $param['value'];
            
        /**
         * Input Class
         */
        $input_class  = '';
        $input_error_class  = '';
        if($this->input_class_exists)
        {
            if(!isset($param['class']))
                $input_class = $this->theme_templates[$this->theme]['input_class'];
            else
                $input_class = $param['class'];
            
            /**
             * Set Error in HTML Field Only Select Theme : Bootstrap 4 Beta
             */
            if($this->theme == "bootstrap4" AND $this->field_error_class($param) )
            {
                $input_error_class = $this->theme_templates[$this->theme]['input_error_class'];
            }
           
            
            // Insert Data in Class
            $input_data['class'] = $input_class.' '.$input_error_class;
        }

        /**
         * Input Type
         */
        if(isset($param['type']))
            $input_data['type'] = $param['type'];

        /**
         * Input Name
         */
        $input_name  = '';
        if($this->input_name_exists)
        {
            if(isset($param['name']))
                $input_name = $param['name'];
            
            // Insert Data in Name
            $input_data['name'] = $input_name;
        }

        /**
         * Input ID
         */
        $input_id  = '';
        if($this->input_id_exists)
        {
            if(isset($param['id']))
            {
                $input_id = $param['id'];
                
                // Insert Data in ID
                $input_data['id'] = $input_id;
            }
        }

        /**
         * Input Placeholder
         */
        $input_placeholder  = '';
        if($this->input_placeholder_exists)
        {
            if(isset($param['placeholder']))
                $input_placeholder = $param['placeholder'];

            else if(!isset($param['placeholder']) AND isset($param['name']))
                $input_placeholder = ucwords($param['name']);
            
            // Insert Data in placeholder
            $input_data['placeholder'] = $input_placeholder;
        }

        /**
         * Input Required
         */
        $input_required  = '';
        if($this->input_required_exists)
        {
            if(isset($param['required']) AND $param['required'] != FALSE) 
            {
                $input_required = 'required';
                
                // Insert Data in required
                $input_data['required'] = $input_required;
            }
        }

        /**
         * Input maxlength
         */
        if(isset($param['maxlength']))
            $input_data['maxlength'] = $param['maxlength'];
        
        /**
         * Input Size
         */
        if(isset($param['size']))
            $input_data['size'] = $param['size'];
        
        /**
         * Input style
         */
        if(isset($param['style']))
            $input_data['style'] = $param['style'];

        /**
         * Field Disabled
         */
        if(isset($param['disabled']) AND $param['disabled'] === TRUE)
            $input_data['disabled'] = "disabled";
        
        /**
         * Input Other Elements with Value
         */
        $input_other_elements = '';
        if(isset($param['other']))
            $input_other_elements = $param['other'];

        return [
            'input_data' => $input_data,
            'input_other_elements' => $input_other_elements,
        ];
    }

    /**
     * Checkbox Field Set Properties
     * @param: checkbox data
     * @return: array()
     * --------------------
     * 1. Value
     * 2. Class with error class
     * 3. Name
     * 4. ID
     * 5. Style
     * 6. Checked (boolean)
     * 7. Other
     */
    private function set_property_checkbox(array $param)
    {
        $checkbox_data  = [];
        $other_data     = [];

        /**
         * Checkbox Value
         */
        if(isset($param['value']))
            $checkbox_value = $param['value'];
        
        /**
         * Checkbox Class and Error Class
         */
        $checkbox_class  = '';
        $checkbox_error_class  = '';
        if($this->checkbox_class_exists)
        {
            /**
             * Checkbox Class
             */
            if(!isset($param['class']))
            {
                /**
                 * Set Class Bootstrap 3
                 * @class: check_checkbox_input_class
                 */
                if($this->theme == "bootstrap3")
                    $checkbox_class = $this->theme_templates[$this->theme]['check_checkbox_input_class'];
                else
                    $checkbox_class = $this->theme_templates[$this->theme]['check_input_class'];
            }else
            {
                $checkbox_class = $param['class'];
            }
            
            /**
             * Error Class
             * ----------------
             * Set Error in HTML Field Only Select Theme : Bootstrap 4 Beta
             */
            if($this->theme == "bootstrap4" AND $this->field_error_class($param) )
            {
                $checkbox_error_class = $this->theme_templates[$this->theme]['input_error_class'];
            }

            // Insert Data in Class
            $checkbox_data['class'] = $checkbox_class.' '.$checkbox_error_class;
        }

        /**
         * Checkbox Name
         */
        $checkbox_name  = '';
        if($this->checkbox_name_exists)
        {
            if(isset($param['name']))
                $checkbox_name = $param['name'];
            
            // Insert Data in Name
            $checkbox_data['name'] = $checkbox_name;
        }

        /**
         * Checkbox ID
         */
        $checkbox_id  = '';
        if($this->checkbox_id_exists)
        {
            if(isset($param['id']))
            {
                $checkbox_id = $param['id'];
                
                // Insert Data in ID
                $checkbox_data['id'] = $checkbox_id;
            }
        }

        /**
         * Checkbox style
         */
        if(isset($param['style']))
            $checkbox_data['style'] = $param['style'];
        
        /**
         * Checkbox checked
         */
        if(isset($param['name']) AND !empty($param['name']))
        {
            // check last two characters from a `[]`
            $end = substr($param['name'], -2);
            if($end == '[]')
            {
                $checkbox_values = set_value(substr($param['name'], 0, -2));
                if(!empty($checkbox_values))
                {
                    foreach ($checkbox_values as $key => $value) {
                        if($value == @$param['value'])
                            $checked = TRUE;
                    }
                }

            }else {
                if(set_value(@$param['name']) == @$param['value'])
                    $checked = TRUE;
            }
        }

        /**
         * Checkbox Disabled
         */
        if(isset($param['disabled']) AND $param['disabled'] === TRUE)
            $checkbox_data['disabled'] = "disabled";

        /**
         * Checkbox Other Elements with Value
         */
        if(isset($param['other']))
            $other_data = $param['other'];

        return [
            'checkbox_data' => $checkbox_data,
            'checkbox_value' => @$checkbox_value,
            'checked'       => @$checked,
            'other_data'    => $other_data,
        ];
    }

    /**
     * Radio Field Set Properties
     * @param: radio data
     * @return: array()
     * --------------------
     * 1. Value
     * 2. Class with error class
     * 3. Name
     * 4. ID
     * 5. Style
     * 6. Checked (boolean)
     * 7. Other
     */
    private function set_property_radio(array $param)
    {
        $radio_data  = [];
        $other_data  = [];

        /**
         * Radio Value
         */
        if(isset($param['value']))
            $radio_value = $param['value'];
        
        /**
         * Radio Class and Error Class
         */
        $radio_class  = '';
        $radio_error_class  = '';
        if($this->radio_class_exists)
        {
            /**
             * Radio Class
             */
            if(!isset($param['class']))
            {
                /**
                 * Set Class Bootstrap 3
                 * @class: check_radio_input_class
                 */
                if($this->theme == "bootstrap3")
                    $radio_class = $this->theme_templates[$this->theme]['check_radio_input_class'];
                else
                    $radio_class = $this->theme_templates[$this->theme]['check_input_class'];
            }else
            {
                $radio_class = $param['class'];
            }
            
            /**
             * Error Class
             * ----------------
             * Set Error in HTML Field Only Select Theme : Bootstrap 4 Beta
             */
            if($this->theme == "bootstrap4" AND $this->field_error_class($param) )
            {
                $radio_error_class = $this->theme_templates[$this->theme]['input_error_class'];
            }

            // Insert Data in Class
            $radio_data['class'] = $radio_class.' '.$radio_error_class;
        }

        /**
         * Radio Name
         */
        $radio_name  = '';
        if($this->radio_name_exists)
        {
            if(isset($param['name']))
                $radio_name = $param['name'];
            
            // Insert Data in Name
            $radio_data['name'] = $radio_name;
        }

        /**
         * Radio ID
         */
        $radio_id  = '';
        if($this->radio_id_exists)
        {
            if(isset($param['id']))
            {
                $radio_id = $param['id'];
                
                // Insert Data in ID
                $radio_data['id'] = $radio_id;
            }
        }

        /**
         * Radio style
         */
        if(isset($param['style']))
            $radio_data['style'] = $param['style'];
        
        /**
         * Radio checked
         */
        if(!empty(set_value(@$param['name'])) AND set_value(@$param['name']) == @$param['value'])
            $checked = TRUE;
        
        /**
         * Radio Other Elements with Value
         */
        if(isset($param['other']))
            $other_data = $param['other'];
        
        /**
         * Radio Disabled
         */
        if(isset($param['disabled']) AND $param['disabled'] === TRUE)
            $radio_data['disabled'] = "disabled";


        return [
            'radio_data'    => $radio_data,
            'radio_value'   => @$radio_value,
            'checked'       => @$checked,
            'other_data'    => $other_data,
        ];
    }

    /**
     * Show Field Error for server response in field bottom
     * @param : field data
     * @return : form_error/null
     */
    private function field_error_text(array $param)
    {
        // config file array key ('error_text' => TRUE)
        if($this->input_field_error_text === TRUE)
        {
            if(!isset($param['error_text']))
                return form_error(@$param['name']);
        }
    }

    /**
     * Show Field Help Text in field bottom
     * @param: field data
     * ----------------------------
     * 1. class
     * 2. text
     * 3. style
     */
    private function field_help_text(array $param)
    {
        // config file array key ('help_text_exists' => TRUE)
        if($this->help_text_exists === TRUE AND isset($param['help']))
        {
            /**
             * Help Element Class
             */
            $help_class = '';
            if(isset($param['help']['class']))
                $help_class = 'class="'.$param['help']['class'].'"';
            else
                $help_class = 'class="'.$this->theme_templates[$this->theme]['help_text_class'].'"';

            /**
             * Help Element Text
             */
            $help_text = '';
            if(is_string($param['help']))
                $help_text = $param['help'];

            else if(isset($param['help']['text']))
                $help_text = $param['help']['text'];

            /**
             * Help Element Style
             */
            if(isset($param['help']['style']))
                $help_style = 'style="'.$param['help']['style'].'"';

            // return data
            return '<small '.$help_class.' '.@$help_style.'>'.$help_text.'</small>';
        }
    }
}