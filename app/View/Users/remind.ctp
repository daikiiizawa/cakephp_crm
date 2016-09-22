<div class="col-md-8 col-md-offset-2">

    <h2>パスワードをお忘れですか？</h2>
    <?= $this->Flash->render('auth'); ?>
    <?= $this->Form->create(NULL, [
        'novalidate' => true,
        'class' => 'form-horizontal',
        'url' => [
            'action' => 'remind'
            ]
        ]); ?>

    <?= $this->Form->input('email', [
        'label' => '登録時使用メールアドレス',
        'type' => 'email',
        'class' => 'form-control'
        ]); ?>

    <?= $this->Form->end([
        'label' => 'パスワード再設定の案内を送る',
        'class' => 'btn btn-primary',
        'style' => 'margin: 20px 0px 20px 0px;'
        ]); ?>

    <?= $this->Html->link(
        'Log in',
        ['action' => 'login']
        ) ;?>
    <br/>

    <?= $this->Html->link(
        'Sign up',
        ['action' => 'signup']
        ) ;?>
    <br/>

</div>
