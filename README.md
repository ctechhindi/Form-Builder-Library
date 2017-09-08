
# Form Builder Library v0.0.1

@jeevanlal


## Thems

| Key           | Info |
| --------------| -------- |
| bootstrap3    | Bootstrap v3.3.5 |
| bootstrap4    | Bootstrap v4.0.0-beta |
| semantic2     | Semantic v2.2.13 |


## Form Builder Config File

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
    'theme' => 'bootstrap3', // bootstrap4, semantic2
    'class' => TRUE,
    'name' => TRUE,
    'id' => TRUE,
    'placeholder' => TRUE,
    'required' => TRUE,
    'label' => [
        'class' => TRUE,
        'for' => TRUE,
    ],
];

$config['set_other_settings_keys'] = [];
```




## Use Config Keys in Library

```php
// by default set config item array (all)
$this->load->library('form_builder');

// use login config item array
$this->load->library('form_builder', 'login');
```

## Set validation error template

```php
// bootstrap4 and bootstrap3
$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
```

## Form Builder Elements

### Input and Textarea

#### Form types

1. hidden
2. password
3. number
4. textarea

```php

$this->form_builder->text([
    'name' => 'username',
    'type' => 'password', // hidden, password
    'value' => set_value('username'),
    'error_class' => false, // by default TRUE
    'error_text' => false, // by default TRUE
    'id' => 'field_id',
    'placeholder' => 'Field Placeholder',
    'maxlength' => 50,
    'size'   => '50',
    'style'  => 'width:50%',
    'required' => true,
    'label' => [
        'class'=> 'label', 
        'text' => 'Article Title'
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