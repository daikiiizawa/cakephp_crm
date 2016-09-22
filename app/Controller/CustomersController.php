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
        $this->find();
    }

    public function find() {
        if ($this->request->data) {
            $search_sei = $this->request->data['Customer']['search_sei'];
            $search_mei = $this->request->data['Customer']['search_mei'];
            $search_mail = $this->request->data['Customer']['search_mail'];
            $search_company = $this->request->data['Customer']['search_company'];
            $search_comment = $this->request->data['Customer']['search_comment'];

            if (!$search_comment) {
                $conditions = [
                    'Customer.family_name LIKE' => "%{$search_sei}%",
                    'Customer.given_name LIKE' => "%{$search_mei}%",
                    'Customer.email LIKE' => "%{$search_mail}%",
                    'Company.name LIKE' => "%{$search_company}%",
                ];
                $customers = $this->paginate('Customer', $conditions);

            } else {
                $this->paginate = [
                    'conditions' => [
                        'Customer.family_name LIKE' => "%{$search_sei}%",
                        'Customer.given_name LIKE' => "%{$search_mei}%",
                        'Customer.email LIKE' => "%{$search_mail}%",
                        'Company.name LIKE' => "%{$search_company}%",
                    ],
                    'joins' => [
                        [
                            'table' => 'comments',
                            'alias' => 'Comment',
                            'type' => 'inner',
                            'conditions' => [
                                'Comment.customer_id = Customer.id',
                                'Comment.body LIKE' => "%{$search_comment}%"
                            ]
                        ]
                    ],
                    'contain' => ['Comment'],
                    'group' => 'Customer.id',
                    'recursive' => 1,
                    'limit' => 10,
                    'order' => ['created' => 'desc']
                ];
                $customers = $this->paginate('Customer');
            }

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

    public function edit($id = null) {
        if (!$this->Customer->exists($id)) {
            throw new NotFoundException('顧客情報がみつかりません');
        }
        $this->set('companies',$this->Company->find('list'));
        $this->set('posts',$this->Post->find('list',['fields'=>['id','position_name']]));

        if ($this->request->is(['post', 'put'])) {
            $this->Customer->id = $id;
            if ($this->Customer->save($this->request->data)) {
                $this->Flash->success('顧客情報を更新しました');
                return $this->redirect(['action' => 'view',$id]);
            }
        } else {
            $this->request->data = $this->Customer->findById($id);
        }
        $this->set('id',$id);
    }

    public function delete($id = null) {
        if (!$this->Customer->exists($id)) {
            throw new NotFoundException('顧客情報がみつかりません');
        }

        $this->request->allowMethod('post', 'delete');
        $this->Customer->delete($id);
        $this->Flash->success('顧客情報を削除しました');
        return $this->redirect(['action' => 'index']);
    }

    public function view($id = null) {
        if (!$this->Customer->exists($id)) {
            throw new NotFoundException('顧客情報がみつかりません');
        }

        // 顧客情報を取得
        $this->Customer->recursive = 2;
        $customer = $this->Customer->findById($id);
        $this->set('customer', $customer);

        // 対応内容のページネーション
        $customerId = $customer['Customer']['id'];
        $comments = $this->paginate('Comment',array('Comment.customer_id' => $customerId));
        $this->set(compact('comments'));
    }
}

