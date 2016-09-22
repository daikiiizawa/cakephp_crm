<div class='container'>

<div class="col-md-12">
    <h2>顧客情報一覧</h2>
    <p>お客様情報が表示されます。</p>
</div>

<div class="col-md-12"?>
<?= $this->Html->link('顧客登録', ['action' => 'add'], [
        'class' => 'btn btn-primary pull-right'
        ]) ;?>
</div>

    <div class='form-inline'>
        <?= $this->Form->create(
            NULL, [
            'novalidate' => true,
            'url' => [
            'action' => 'find',
            'class' => 'form-group'
            ]]); ?>

        <div class="form-group">
        <?= $this->Form->input(
            'search', [
            'label' => '姓',
            'class' => 'form-control',
            ]); ?>
        </div>

        <div class="form-group">
        <?= $this->Form->input(
            'search', [
            'label' => '名',
            'class' => 'form-control'
            ]); ?>
        </div>

        <div class="form-group">
        <?= $this->Form->input(
            'search', [
            'label' => '電子メール',
            'class' => 'form-control',
            'style' => 'width:250px'
            ]); ?>
        </div>

        <div class="form-group">
        <?= $this->Form->input(
            'search', [
            'label' => '会社名',
            'class' => 'form-control',
            'style' => 'width:250px'
            ]); ?>
        </div>

        <div class="form-group">
        <?= $this->Form->input(
            'search', [
            'label' => 'コメント',
            'class' => 'form-control',
            'style' => 'width:250px'
            ]); ?>
        </div>
    </div>

    <div class="text-center" style="margin-top:20px;">
        <div class="btn-group">
            <?= $this->Form->end([
                'label' => '検索',
                'class' => 'btn btn-default active'
                ]); ?>
        </div>

        <div class="btn-group">
            <?= $this->Form->end([
                'label' => 'リセット',
                'class' => 'btn btn-default active'
                ]); ?>
        </div>
    </div>

<hr noshade>

</div>


<table class="table table-striped">
    <thead class="text-info">
        <th>姓</th>
        <th>名</th>
        <th>メールアドレス</th>
        <th>会社名</th>
        <th>役職名</th>
        <th>コメント数</th>
        <th>リンク</th>
    </thead>

    <tbody>
    <?php foreach ($customers as $customer) :?>
        <tr>
            <td><?= $customer['Customer']['family_name'] ;?></td>
            <td><?= $customer['Customer']['given_name'] ;?></td>
            <td><?= $customer['Customer']['email'] ;?></td>
            <td><?= $customer['Company']['name'] ;?></td>
            <td><?= $customer['Post']['position_name'] ;?></td>
            <td><?= count($customer['Comment']);?></td>
            <td class="btn btn-default">
                <?= $this->Html->link('詳細',['action' => 'view']) ;?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="pagination">

<?= $this->Paginator->first('最初', $options = array()) ;?>
<?= $this->Paginator->prev('前へ', array(), null, ['class' => 'prev disabled']) ;?>
<?= $this->Paginator->numbers(array('separator' => '')) ;?>
<?= $this->Paginator->next('次へ', array(), null, ['class' => 'next disabled']) ;?>
<?= $this->Paginator->last('最後', $options = array()) ;?>

</div>

</div>