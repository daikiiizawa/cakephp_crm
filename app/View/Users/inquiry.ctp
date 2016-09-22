<div class="col-md-8 col-md-offset-2">

    <h2>入力メールアドレスへメール送信が完了しました</h2>
    <?= $this->Flash->render('auth'); ?>

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
