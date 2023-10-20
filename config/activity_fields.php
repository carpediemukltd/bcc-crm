<?php
return [
   
    'company' => [
        'add' => [
            'company_name' => 'name',
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'email' => 'email',
            'phone_number'  => 'phone_number',
            'role' => 'role',
            'password' => 'password', // Map input field 'company_name' to database field 'name'
        ],


       
        'edit' => [
            'company_name' => 'name', // Map input field 'company_name' to database field 'name'
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'email' => 'email',
            'phone_number'  => 'phone_number',
            'role' => 'role',
            'password' => 'password',
        ],
    ],

    'pipeline' => [
        'add' => [
            'title' => 'title',
            'stages' => 'stages',
             // Map input field 'company_name' to database field 'name'
        ],

        'edit' => [
            'title' => 'title',
            'stages' => 'stages',
             // Map input field 'company_name' to database field 'name'
        ],
    ],


    'customfield' => [
        'add' => [
            'title' => 'title',
            'type' => 'type',
            'visible' => 'visible',
        ],

        'edit' => [
            'title' => 'title',
            'type' => 'type',
            'visible' => 'visible',
        ],
    
    ],


    'user' => [
        'add' => [
           
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'email' => 'email',
            'phone_number'  => 'phone_number',
            'role' => 'role',
            'password' => 'password', // Map input field 'company_name' to database field 'name'
        ],


       
        'edit' => [
           // Map input field 'company_name' to database field 'name'
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'email' => 'email',
            'phone_number'  => 'phone_number',
            'role' => 'role',
            'password' => 'password',
            'role' => 'role',
            'owner' => 'owner',
            'custom_fields' => 'custom_fields'
        ],
    ],


];