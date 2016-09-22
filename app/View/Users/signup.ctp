<div class="col-md-8 col-md-offset-2">

    <h2>ユーザー新規登録</h2>
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

    <?= $this->Form->input('password', [
        'label' => 'パスワード (8文字以上が必要です)',
        'type'  => 'password',
        'class' => 'form-control'
        ]); ?>

    <?= $this->Form->input('password_confirm', [
        'label' => 'パスワード再入力',
        'type'  => 'password',
        'class' => 'form-control'
        ]); ?>

    <?= $this->Form->end([
        'label' => '新規登録',
        'class' => 'btn btn-primary btn-lg',
        'style' => 'margin: 20px 0px 20px 0px;'
        ]); ?>

    <?= $this->Html->link(
        'Log in',
        ['action' => 'login']
        ) ;?>

</div>