<?php

class CustomersController extends AppController {

    public $uses = ['Customer'];

    public $components = [
        'Paginator' => [
            'limit' => 10,
            'order' => ['created' => 'desc']
        ]
    ];

    public function index() {

    }
}