<?php

class Post extends AppModel {

    public $hasMany = [
        'Customer' => ['className' => 'Customer']
    ];
}