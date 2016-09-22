<div class="container">
<div class="col-md-8 col-md-offset-2">

    <h2>顧客情報の編集</h2>
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
        'class' => 'form-control'
        ]) ;?>

    <?= $this->Form->input('post_id', [
        'label' => '役職',
        'class' => 'form-control'
        ]) ;?>

    <?= $this->Form->end([
        'label' => '更新する',
        'class' => 'btn btn-primary',
        'style' => 'margin: 20px 0px 20px 0px;'
        ]); ?>
    <?= $this->Form->hidden('id'); ?>

    <?= $this->Form->postLink(
        '顧客情報を削除', ['action' => 'delete', $id], [
            'confirm' => '本当に削除してよろしいですか？',
            'class' => "btn btn-danger"
        ]); ?>
    <?= $this->Html->link(
        '戻る',['action' => 'view', $id],[
        'class' => "btn btn-default"]
        ) ;?>

</div>
</div>