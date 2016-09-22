<div class='container'>
<div class="col-md-8 col-md-offset-2">

    <table>
        <h2>顧客情報詳細</h2>
        <body>
            <dl>
                <dt>お名前</dt>
                <dd><?= h($customer['Customer']['family_name']) . '&nbsp;' .
                h($customer['Customer']['given_name']);?></dd>
            </dl>

            <dl>
                <dt>電子メール</dt>
                <dd><?= h($customer['Customer']['email']) ;?></dd>
            </dl>

            <dl>
                <dt>会社名</dt>
                <dd><?= h($customer['Company']['name']) ;?></dd>
            </dl>

            <dl>
                <dt>役職名</dt>
                <dd><?= h($customer['Post']['position_name']) ;?></dd>
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
        <h2>対応履歴 (<?= count($comments);?>件)</h2>

        <?php foreach ($comments as $comment): ?>
            <tr>
                <td style="width:10%;">
                    <?= $this->Html->Image(
                        h($comment['User']['image_url']),
                        ['style' => 'width: 50px'])
                    ;?>
                </td>

                <td>
                <ul style="list-style:none;">
                    <li><?= h($comment['User']['family_name']).'&nbsp;'.
                        h($comment['User']['given_name']) ;?></li>

                        <li><p><?= h($comment['Comment']['body']) ;?></p></li>

                    <li>
                        投稿日時：<?= $comment['Comment']['created'] ;?>
                        <?= $this->Form->postLink(
                            '削除する',[
                            'controller' => 'comments',
                            'action' => 'delete',
                            $comment['Comment']['id']], [
                                'confirm' => '本当に削除してよろしいですか？',
                            ]
                        ) ;?>
                    </li>
                </ul>
                </td>
            </tr>
        <?php endforeach ?>
    </table>

    <!-- 対応履歴ページネーション -->
    <div class="pagination">
        <?= $this->Paginator->first('最初', $options = array()) ;?>
        <?= $this->Paginator->prev('前へ', array(), null, ['class' => 'prev disabled']) ;?>
        <?= $this->Paginator->numbers(array('separator' => '')) ;?>
        <?= $this->Paginator->next('次へ', array(), null, ['class' => 'next disabled']) ;?>
        <?= $this->Paginator->last('最後', $options = array()) ;?>
    </div>

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
</div>