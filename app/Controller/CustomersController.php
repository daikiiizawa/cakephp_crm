<?php

class CustomersController extends AppController {
    public $uses = ['Customer', 'Company', 'Post', 'Comment'];
    public $name = 'Customers';

    public $components = [
        'Paginator' => [
            'limit' => 10,
            'order' => ['created' => 'desc']
        ]
    ];

    public function index() {
        $customers = $this->Paginator->paginate('Customer');
        $this->set('customers', $customers);
    }

    public function find() {
        if ($this->request->data) {
            $confitions = array();
            $search = $this->request->data['Customer']['search'];
            $conditions = array('Customer.family_name LIKE' => "%{$search}%");
            $customers = $this->paginate('Customer', $conditions);

        } else {
            $customers = $this->paginate('Customer');
        }
        $this->set('customers', $customers);
    }

    public function add() {
        $this->set('companies',$this->Company->find('list'));
        $this->set('posts',$this->Post->find('list',['fields'=>['id','position_name']]));

        if ($this->request->is('post')) {
            $this->Customer->create();

            if ($this->Customer->save($this->request->data)) {
                $this->Flash->success('登録が完了しました');
                return $this->redirect(['action' => 'index']);
            }
        }
    }

}