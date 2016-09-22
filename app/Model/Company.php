<?php

class Company extends AppModel {

    public $hasMany = [
        'Customer' => ['className' => 'Customer']
    ];
}