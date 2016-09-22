<div class="col-md-8 col-md-offset-2">

    <h2>ユーザー編集</h2>
    <?= $this->Form->create('User', [
        'type'  => 'post',
        'novalidate' => true,
        ]); ?>

    <?= $this->Form->input('family_name', [
        'label' => '姓',
        'type'  => 'name',
        'class' => 'form-control'
        ]); ?>

    <?= $this->Form->input('given_name', [
        'label' => '名',
        'type'  => 'name',
        'class' => 'form-control'
        ]); ?>

    <?= $this->Form->input('email', [
        'label' => '電子メール',
        'type'  => 'email',
        'class' => 'form-control'
        ]); ?>

    <?= $this->Form->input('image_url', [
        'label' => 'プロフィール画像',
        'type'  => 'text',
        'class' => 'form-control'
        ]); ?>

    <p>現在設定されている画像</p>
    <td style="width:10%;">
        <?= $this->Html->Image(
            h($currentUser['image_url']),
            ['style' => 'width: 50px'])
        ;?>
    </td>

    <?= $this->Form->input('password', [
        'label' => '新しいパスワード',
        'type'  => 'password',
        'class' => 'form-control',
        ]); ?>

    <?= $this->Form->input('password_confirm', [
        'label' => '新しいパスワード (再入力)',
        'type'  => 'password',
        'class' => 'form-control'
        ]); ?>

    <?= $this->Form->input('password_current', [
        'label' => '現在のパスワード',
        'type'  => 'password',
        'class' => 'form-control'
        ]); ?>

    <?= $this->Form->hidden('id') ?>

    <?= $this->Form->end([
        'label' => '更新する',
        'class' => 'btn btn-primary bimage_url',
        'style' => 'margin-top: 20px;'
        ]); ?>

    <hr>
    <h3>アカウント削除</h3>

    <?= $this->Form->postLink(
        'アカウントを削除する', [
            'action' => 'userdelete',
            $currentUser['id']
        ], [
            'confirm' => '本当に削除してよろしいですか？',
            'class' => "btn btn-danger",
            'style' => 'margin: 10px 0 10px 0;'
    ]); ?> <br/>

    <?= $this->Html->link(
        '戻る', [
            'controller' => 'customers',
            'action' => 'index'], [
                'class' => "btn btn-default",
                'style' => 'margin: 0 0 20px 0;'
            ]
    ); ?>

</div>