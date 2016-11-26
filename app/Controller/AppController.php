<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $uses = array('User');

    public function beforefilter() {
        // set cookie options
        $this->Cookie->key = 'qSI232qs*&sXOw!adre@34SAv!@*(XSL#$%)asGb$@11~_+!@#HKis~#^';
        $this->Cookie->httpOnly = true;

        if (!$this->Auth->loggedIn() && $this->Cookie->read('remember_me_cookie')) {
            $cookie = $this->Cookie->read('remember_me_cookie');
            $user = $this->User->find('first', [
                'conditions' => [
                    'User.email' => $cookie['email'],
                    'User.password' => $cookie['password']
                ]
            ]);
            // if ($user && !$this->Auth->login($user['User'])) {
            //     $this->redirect('/users/logout'); // destroy session & cookie
            // }
        }
        $this->set('currentUser', $this->Auth->user());
    }

    public $components = [
        'DebugKit.Toolbar',
        'Flash',
        'Cookie',
        'Auth' => [
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login',
            ],
            'authenticate' => [
                'Form' => [
                    'UserModel' => 'User',          // 認証に使うモデルを指定（デフォルト値と同じな為、省略可）
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password',   // （デフォルト値と同じな為、省略可）
                    ],
                    'passwordHasher' => 'Blowfish', // パスワードがハッシュ化されている方式を指定
                ]
            ],
            'loginRedirect' => [
                'controller' => 'customers',
                'action' => 'index',
            ],
            'logoutRedirect' => [
                'controller' => 'users',
                'action' => 'login',
            ],

            'authError' => 'ログインしてください',   // ログインが必要なページにアクセスした時のメッセージ
            // CSRF、マスアサインメント対策として Security コンポーネントを使用する
            // CSRF対策：フォームにトークンが追加されるようになる
            // マスアサインメント対策：フォーム改ざんチェックが行われる
            'Security',
        ],
    ];

    public $helpers = [
        'Session',
        'Html' => ['className' => 'TwitterBootstrap.BootstrapHtml'],
        'Form' => ['className' => 'TwitterBootstrap.BootstrapForm'],
        'Paginator' => ['className' => 'TwitterBootstrap.BootstrapPaginator'],
    ];
    public $layout = 'bootstrap';

}
