<div class="container">
<div class="col-md-8 col-md-offset-2">

    <h2>顧客情報の編集</h2>
    <?= $this->element('Customers/form', [
        'submitLabel' => '更新する'
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