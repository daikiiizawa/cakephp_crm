<?php

class Comment extends AppModel {

    public $belongsTo = [
        'Customer' => ['className' => 'Customer'],
        'User' => ['className' => 'User',]
    ];

    public $validate = [
        'body' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '対応内容が未入力です'
            ],
        ],
    ];

}