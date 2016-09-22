<div class='container'>

<div class="col-md-8 col-md-offset-2">

<table>
    <h2>顧客情報詳細</h2>
    <body>
        <dl>
            <dt>お名前</dt>
            <dd><?= $customer['Customer']['family_name'] . '&nbsp;' . $customer['Customer']['given_name'];?></dd>
        </dl>

        <dl>
            <dt>電子メール</dt>
            <dd><?= $customer['Customer']['email'] ;?></dd>
        </dl>

        <dl>
            <dt>会社名</dt>
            <dd><?= $customer['Company']['name'] ;?></dd>
        </dl>

        <dl>
            <dt>役職名</dt>
            <dd><?= $customer['Post']['position_name'] ;?></dd>
        </dl>

        <?= $this->Html->link(
            '編集', ['action' => 'edit',$customer['Customer']['id']], [
            'class' => 'btn btn-primary'
            ]) ;?>&nbsp;

        <?= $this->Html->link(
            '戻る', ['action' => 'index'], [
            'class' => 'btn btn-default'
            ]) ;?>
    </body>
    <hr noshade>
</table>

<!-- 対応履歴一覧 -->
<table>
    <h2>対応履歴</h2>
    <?php foreach ($customer['Comment'] as $customer['Comment']): ?>
        <tr>
        <td style="width:10%;">
            <?= $this->Html->Image(
                $customer['Comment']['User']['image_url'],
                ['style' => 'width: 50px'])
            ;?>
        </td>

        <td>
        <ul style="list-style:none;">
            <li><?= $customer['Comment']['User']['family_name'].'&nbsp;'.
                $customer['Comment']['User']['given_name'] ;?></li>

            <li><?= $customer['Comment']['body'] ;?></li>

            <li>
                投稿日時：<?= $customer['Comment']['created'] ;?>
                <?= $this->Form->postLink(
                    '削除する',['controller' => 'comments', 'action' => 'delete',$customer['Comment']['id']], [
                    'confirm' => '本当に削除してよろしいですか？',
                    ]) ;?>
            </li>
        </ul>
        </td>
        </tr>
    <?php endforeach ?>
</table>

    <!-- 対応内容フォーム -->
    <?= $this->Form->create('Comment',[
        'novalidate' => true,
        'url' => [
            'controller' => 'comments',
            'action' => 'add'
        ]
    ]);?>

    <?= $this->Form->input('body', [
        'label' => '対応内容',
        'class' => 'form-control',
    ]); ?>

    <?= $this->Form->input('customer_id', [
        'type' => 'hidden',
        'value' => $customer['Customer']['id']
    ]); ?>

    <?= $this->Form->input('user_id', [
        'type' => 'hidden',
        'value' => $currentUser['id']
    ]); ?>

    <?= $this->Form->end([
        'label' => '登録する',
        'class' => 'btn btn-primary',
        'style' => 'margin:20px 0 30px 0'
    ]) ;?>


</div>