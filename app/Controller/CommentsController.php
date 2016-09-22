<?php

class CommentsController extends AppController {
    public $uses = ['Comment', 'Customer'];

    public function delete($id = null){
        if (!$this->Comment->exists($id)) {
            throw new NotFoundException('対応履歴がみつかりません');
        }
        $customerId = $this->Comment->findById($id)['Customer']['id'];
        $this->set('customerId', $customerId);

        $this->request->allowMethod('post', 'delete');
        $this->Comment->delete($id);
        $this->Flash->success('対応履歴を削除しました');

        return $this->redirect([
            'controller' => 'customers',
            'action' => 'view',$customerId
        ]);
    }

    public function add(){
        if ($this->request->is('post')) {
            $this->Comment->create();
            $customerId = $this->request->data['Comment']['customer_id'];
            $this->set('customerId', $customerId);

            if ($this->Comment->save($this->request->data)){
                $this->Flash->success('対応内容を登録しました');
                return $this->redirect(['controller' => 'customers', 'action' => 'view',$customerId]);

            } else {
                $this->Flash->error('対応内容が未入力です');
                return $this->redirect(['controller' => 'customers', 'action' => 'view',$customerId]);
            }
        }
    }
}