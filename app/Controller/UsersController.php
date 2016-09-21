<?php

App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('signup');
    }

    public function signup() {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('ユーザーを登録しました');
                return $this->redirect(['action' => 'login']);
            }
        }
    }

    public function edit() {
        if ($this->request->is(['post', 'put'])) {

            if ($this->User->save($this->request->data)) {
                $this->Flash->success('会員情報を変更しました');

                // Authコンポーネントのログインセッション情報をリフレッシュする
                $user = $this->User->find('first', [
                        'fields' => ['id', 'email'],
                        'conditions' => ['id' => $this->Auth->user('id')]
                    ]);
                $this->Auth->login($user['User']);

                return $this->redirect($this->Auth->redirectUrl());
            }
        } else {
            $this->request->data = ['User' => [
                'id' => $this->Auth->user('id'),
                'name' => $this->Auth->user('name'),
                'email' => $this->Auth->user('email'),
                'photo_dir' => $this->Auth->user('photo_dir'),
                'photo' => $this->Auth->user('photo'),
                'body' => $this->Auth->user('body'),
                'role' => $this->Auth->user('role'),
                ]];
        }
    }

    public function login() {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('メールアドレスかパスワードが違います');
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

}