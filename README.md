
# Form Builder Library v0.0.2
There CSS Framework Support

@jeevanlal

> ## Features

### Bootstrap 4

* All Form Components supported
*  **Form inline** support

----------

### Bootstrap 3

* All Form Components supported
* **Form inline** support

----------

### Semantic 2

*  All Form Components supported

----------

## Thems

| Key           | Info |
| --------------| -------- |
| bootstrap3    | Bootstrap v3.3.5 |
| bootstrap4    | Bootstrap v4.0.0-beta |
| semantic2     | Semantic v2.2.13 |


> ## Form Builder Config File

By default use config key ```all```

```php

$config['all'] = [
    'theme' => 'bootstrap3', // bootstrap4, semantic2 , by default set bootstrap3
    // 'class' => FALSE,
    'label' => [
        'class' => false,
        'for' => False,
    ],
];


$config['login'] = [
    'theme' => $theme, // bootstrap3, bootstrap4, semantic2
    'class' => TRUE,
    'name' => TRUE,
    'id' => TRUE,
    'placeholder' => TRUE,
    'required' => TRUE,
    // 'group' => False, // by default TRUE
    // 'error_class' => False, // by default TRUE
    // 'error_text' => False, // by default TRUE
    'label' => [
        'class' => TRUE,
        'for' => TRUE,
    ],
];

$config['set_other_settings_keys'] = [];
```




> ## Use Config Keys in Library

```php
// by default set config item array (all)
$this->load->library('form_builder');

// use login config item array
$this->load->library('form_builder', 'login');
```

> ## Set validation error template

```php
// bootstrap4 and bootstrap3
$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
```


> ## Form Builder Elements

### Input and Textarea

#### Form types

1. hidden
2. password
3. number
4. textarea
5. file

```php

$this->form_builder->text([
    'name' => 'username',
    // 'type' => 'textarea',
    'value' => set_value('username'),
    // 'class' => '',
    'error_class' => false, // by default TRUE
    'error_text' => false, // by default TRUE
    'id' => 'field_id',
    'placeholder' => 'Field Placeholder',
    'maxlength' => 50,
    'size'   => '50',
    'style'  => 'width:50%',
    'required' => true,
    // 'group' => false, // by default true
    // 'disabled' => true, // by default false
    'label' => [
        'class'=> 'label', 
        'text' => 'Article Title'
    ],
    'help' => [
        // 'class' => 'text-danger',
        'text' => 'Field Help Text',
        // 'style' => 'background-color:red;',
    ],
    'other' => [
        'onClick' => "alert('Jeevan');"
    ]
]); 
```

### Dropdown and Multiselect

#### Form types

By default type is dropdown and use type multi for Multiselect

```php
$this->form_builder->select([
    // 'type' => 'multi',
    'name' => 'roles', // 'roles[] for multiselect
    'options' => [
        'small'   => 'Small Shirt',
        'med'     => 'Medium Shirt',
        'large'   => 'Large Shirt',
        'xlarge'  => 'Extra Large Shirt',
    ],
    'select' => set_value('roles'), // roles[] for multiselect
    'other' => [
        //  'onClick' => "alert('Jeevan');"
    ],
]);
```


### Checkbox

1. Single Checkbox

```php
$this->form_builder->checkbox([
    'name' => 'accept_terms_checkbox',
    'text' => 'Please Select Check Box',
    'id'  => 'newsletter',
    'value'   => '1',
    // 'style'   => 'margin:10px'
    'other' => [
        //  'onClick' => "alert('Jeevan');"
    ],
]);
```

2. Multi Checkbox

```php
$this->form_builder->checkbox([
    'name' => 'multi_checkbox[]',
    'text' => 'Hindi',
    'id'  => 'newsletter',
    'value'   => '1',
    // 'style'   => 'margin:10px',
    'inline' => true,
    // 'group' => false,
    'error_text' => false, // by default TRUE
    // 'disabled' => true, // by default false
    'other' => [
        //  'onClick' => "alert('Jeevan');"
    ],
]);

$this->form_builder->checkbox([
    'name' => 'multi_checkbox[]',
    'text' => 'English',
    'id'  => 'newsletter',
    'value'   => '2',
    'inline' => true,
    // 'group' => false, 
    // 'style'   => 'margin:10px'
    'other' => [
        //  'onClick' => "alert('Jeevan');"
    ],
]);
```



### Radio

```php
$this->form_builder->radio([
    'name' => 'radio',
    'text' => 'Male',
    'id'  => 'newsletter',
    'value'   => 'Male',
    // 'style'   => 'margin:10px'
    'error_text' => false, // by default TRUE
    // 'inline' => true,
    // 'group' => false,
    'other' => [
        //  'onClick' => "alert('Jeevan');"
    ],
]);

$this->form_builder->radio([
    'name' => 'radio',
    'text' => 'Female',
    'id'  => 'newsletter',
    'value'   => 'Female',
    // 'inline' => true,
    // 'group' => false,
    // 'style'   => 'margin:10px',
    // 'disabled' => true, // by default false
    'other' => [
        //  'onClick' => "alert('Jeevan');"
    ],
]);
```

### Submit and Reset Button

```php
$this->form_builder->submit([
    'name' => 'submit_name',
    'id' => 'submit_id',
    // 'type' => 'reset', // submit and reset by default submit
    'value' => 'Login',
    'class' => 'btn btn-info btn-lg btn-block',
    'style'  => 'margin-bottom: 8px;',
    // 'disabled' => true, // by default false
    'other' => [
        // 'onClick' => "alert('Jeevan');"
    ]
]);
```

### Button

```php
$this->form_builder->button([
    'name' => 'submit_name',
    'id' => 'submit_id',
    'value' => '<i class="fa fa-image"></i> Button',
    'class' => 'btn btn-warning btn-lg btn-block',
    'style'  => 'margin-bottom: 8px;',
    // 'disabled' => true, // by default false
    'other' => [
        // 'onClick' => "alert('Jeevan');"
    ]
]);
```

# Demo

![Demo Image](https://bytebucket.org/jeevanlal/form-builder-with-codeigniter/raw/588329fac670d8b2f7441a3c76f58ce7f5a083c7/assets/demo_img.png)