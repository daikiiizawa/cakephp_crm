<?php

class Comment extends AppModel {

    public $belongsTo = [
        'Customer' => ['className' => 'Customer'],
        'User' => ['className' => 'User',]
    ];
}