<div class="container">
<div class="col-md-8 col-md-offset-2">

    <h2>顧客新規登録</h2>
    <?= $this->element('Customers/form', [
        'submitLabel' => '登録する'
        ]); ?>

    <?= $this->Html->link(
        '戻る',['action' => 'index'],[
        'class' => "btn btn-default"]
        ) ;?>

</div>
</div>