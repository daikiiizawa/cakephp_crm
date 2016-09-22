<?php

App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {
    public $name = 'Users';

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('signup', 'remind', 'inquiry');
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

    public function useredit() {
        if ($this->request->is(['post', 'put'])) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('設定を更新しました');

                // Authコンポーネントのログインセッション情報をリフレッシュする
                $user = $this->User->find('first', [
                        'fields' => ['id','family_name', 'given_name', 'email', 'image_url'],
                        'conditions' => ['id' => $this->Auth->user('id')]
                    ]);
                $this->Auth->login($user['User']);

                return $this->redirect($this->Auth->redirectUrl());
            }
        } else {
            $this->request->data = ['User' => [
                'id' => $this->Auth->user('id'),
                'family_name' => $this->Auth->user('family_name'),
                'given_name' => $this->Auth->user('given_name'),
                'email' => $this->Auth->user('email'),
                'image_url' => $this->Auth->user('image_url'),
                ]];
        }
    }

    public function userdelete($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException('該当アカウントがありません');
        }

        $this->request->allowMethod('post', 'delete');
        $this->User->delete($id);

        $this->redirect($this->Auth->logout());
    }

    public function login() {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                // remember_meがチェックされている場合
                if ($this->data['remember_me']){
                    // cookieへの書き込みにremember_meを除外
                    unset( $this->request->data['remember_me']);
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
                    $cookie = $this->request->data;
                    // cookie書き込み
                    $this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '+2 weeks');
                // remember_meがチェックされていない場合
                } else {
                }
                // リダイレクト
                $this->Flash->success('ログインしました');
                $this->redirect($this->Auth->redirectUrl());

                }
            $this->Flash->error('メールアドレスかパスワードが違います');
        }
    }

    public function logout() {
        $this->Cookie->delete('remember_me_cookie');
        $this->Flash->success('ログアウトしました');
        $this->redirect($this->Auth->logout());
    }

    // パスワードリマインダ処理
    public function remind () {
        if (!empty($this->request->data['User']['email'])) {

            $email = $this->request->data['User']['email'];
            $this->set('email', $email);

            $user = $this->User->find('first', [
                'recursive' => -1,
                'conditions' => ['User.email' => $email],
            ]);
            if ($user === false || empty($user)) {
                $this->Flash->error('登録されていないメールアドレスです');
                return false;
            }

        }
    }
    public function inquiry() {
    }
}