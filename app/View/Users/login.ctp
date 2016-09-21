<div class="col-md-12">
    <h2>ログイン</h2>

    <div class="col-md-8">
    <?= $this->Flash->render('auth'); ?>
    <?= $this->Form->create('User', [
            'novalidate' => true,
            'class' => 'form-horizontal',
            ]); ?>

    <?= $this->Form->input('email', [
            'label' => '電子メール',
            'class' => 'form-control'
            ]); ?>

    <?= $this->Form->input('password', [
            'label' => 'パスワード',
            'class' => 'form-control'
            ]); ?>

    <?= $this->Form->end([
            'label' => 'ログイン',
            'class' => 'btn btn-default btn-lg',
            'style' => 'margin-top: 20px;'
            ]); ?>
    </div>
</div>
