<div class="col-md-8 col-md-offset-2">

    <h2>ログイン</h2>
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
            ]); ?></br>

    <input type="checkbox" name="remember_me" checked>&nbsp;ログイン情報を記録する

    <?= $this->Form->end([
            'label' => 'ログイン',
            'class' => 'btn btn-default btn-lg',
            'style' => 'margin: 20px 0px 20px 0px;'
            ]); ?>

    <?= $this->Html->link(
            'Sign up',
            ['action' => 'signup']
            ) ;?><br/>

    <?= $this->Html->link(
            'Forgot your password?',
            ['action' => 'remind']
            ) ;?>
</div>