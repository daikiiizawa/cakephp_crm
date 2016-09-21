<div class="col-md-12">
    <h2>ユーザー新規登録</h2>

    <div class="col-md-8">
    <?= $this->Form->create('User', [
            'type'  => 'post',
            'novalidate' => true,
            'class' => 'form-horizontal',
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

    <?= $this->Form->input('photo', [
            'label' => 'プロフィール画像',
            'type'  => 'url',
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
            'class' => 'btn btn-default btn-lg',
            'style' => 'margin-top: 20px;'
            ]); ?>
    </div>
</div>