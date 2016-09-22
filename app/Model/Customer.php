<?php

class Customer extends AppModel {

    public $belongsTo = [
        'Company' => ['className' => 'Company'],
        'Post' => ['className' => 'Post',]
    ];

    public $hasMany = [
        'Comment' => ['className' => 'Comment']
    ];
}