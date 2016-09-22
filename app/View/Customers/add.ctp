<div class="col-md-8 col-md-offset-2">

<div class="form-group">

    <h2>顧客新規登録</h2>
    <?= $this->Form->create('Customer', [
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
        'label' => 'メールアドレス',
        'type'  => 'email',
        'class' => 'form-control'
        ]); ?>

    <!-- プルダウンメニュー -->
    <?= $this->Form->input('company_id', [
        'label' => '会社名',
        'class' => 'form-control',
        'empty' => '会社を選択してください'
        ]) ;?>

    <?= $this->Form->input('post_id', [
        'label' => '役職',
        'class' => 'form-control',
        'empty' => '役職を選択してください'
        ]) ;?>

    <?= $this->Form->end([
        'label' => '登録する',
        'class' => 'btn btn-primary',
        'style' => 'margin: 20px 0px 20px 0px;'
        ]); ?>


</div>
</div>