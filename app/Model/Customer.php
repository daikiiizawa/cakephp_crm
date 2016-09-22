<?php

class Customer extends AppModel {

    public $belongsTo = [
        'Company' => ['className' => 'Company'],
        'Post' => ['className' => 'Post',]
    ];

    public $hasMany = [
        'Comment' => ['className' => 'Comment']
    ];

    public $validate = [
        'family_name' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '姓を入力してください。'
            ],
        ],
        'given_name' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '名を入力してください。'
            ],
        ],
        'email' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => 'メールアドレスを入力してください。'
            ],
            'validEmail' => [
                'rule' => 'email',
                'message' => '正しいメールアドレスを入力してください。'
            ],
            'emailExists' => [
                'rule' => ['isUnique'],
                'message' => '入力されたメールアドレスは既に登録されています。',
                'on' => 'create'
            ],
        ],
        'company_id' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '会社が選択されていません。'
            ],
        ],
        'post_id' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '役職が選択されていません。'
            ],
        ],
    ];
}