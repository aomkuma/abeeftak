<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Event\Event;

/**
 * FarmHerdsmans Controller
 *
 * @property \App\Model\Table\FarmHerdsmansTable $FarmHerdsmans
 *
 * @method \App\Model\Entity\FarmHerdsman[] paginate($object = null, array $settings = [])
 */
class FarmHerdsmansController extends AppController {

    public $FarmHerdsmans = null;
    public $Herdsmans = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->FarmHerdsmans = TableRegistry::get('FarmHerdsmans');
        $this->Herdsmans = TableRegistry::get('Herdsmans');
        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    public function index($farm_id = null) {
        $this->viewBuilder()->layout('clean_layout');




        $query = $this->FarmHerdsmans->find()
                ->contain(['Herdsmans'])
                ->where(['FarmHerdsmans.farm_id' => $farm_id])
                ->order(['FarmHerdsmans.seq' => 'ASC']);
        $farmHerdsmans = $query->toArray();


        $subquery = $this->FarmHerdsmans->find()
                ->select(['herdsman_id']);
        $q = $subquery->toArray();
        $ids = ['xx'];
        foreach ($q as $item) {
            array_push($ids, $item['herdsman_id']);
        }
        //debug($subquery);



        $herdsmans = $this->Herdsmans->find('list', [
                    'keyField' => 'id', 'valueField' => 'firstname',
                ])
                ->where(['id NOT IN' => $ids]);
        $herdsmans = $herdsmans->toArray();



        $this->set(compact('farmHerdsmans'));
        $this->set(compact('herdsmans'));
        $this->set('farm_id', $farm_id);
        $this->set('_serialize', ['farmHerdsmans']);
    }

    public function addherdsman($farm_id = null) {
        $this->autoRender = false;
        if ($this->request->is(['post'])) {
            $farmherdsman = $this->FarmHerdsmans->newEntity();
            $data = $this->request->getData();
            $this->log($data, 'debug');
            $farmherdsman->farm_id = $data['farm_id'];
            $farmherdsman->herdsman_id = $data['herdsman_id'];
            //$farmherdsman->description = $data['description'];
            $farmherdsman->seq = $this->getMaxSeq($farmherdsman->farm_id);
            $farmherdsman->createdby = $this->request->session()->read('Auth.User.firstname');
            //$this->log($farmherdsman, 'debug');
            $result = $this->FarmHerdsmans->save($farmherdsman);
            //$this->log($result, 'debug');
            if ($result) {
                //$this->log($result, 'debug');
                $this->Flash->success(__('เพิ่มผู้เลี้ยงโคเรียบร้อย'));
            } else {
                $this->log($farmherdsman->errors(), 'debug');
            }
        }

        return $this->redirect(['action' => 'index', $farm_id]);
    }

    /*
      public function addherdsman() {


      $this->autoRender = false;
      //$this->log('a','debug');
      if ($this->request->is(['post'])) {
      $farmherdsman = $this->FarmHerdsmans->newEntity();
      //$farmCows = $this->FarmCows->newEntity();
      $data = [];
      $postData = $this->request->getData();
      //$this->log($postData, 'debug');
      $postData = $postData['data'];
      parse_str($postData, $data);

      //$this->log($data, 'debug');
      $farmherdsman->farm_id = $data['farm_id'];
      $farmherdsman->herdsman_id = $data['herdsman_id'];
      $farmherdsman->description = $data['description'];
      $farmherdsman->seq = $this->getMaxSeq($farmherdsman->farm_id);
      $farmherdsman->createdby = $this->request->session()->read('Auth.User.firstname');
      //$this->log($farmherdsman, 'debug');
      $result = $this->FarmHerdsmans->save($farmherdsman);
      //$this->log($result, 'debug');
      if ($result) {
      //$this->log($result, 'debug');
      } else {
      $this->log($farmherdsman->errors(), 'debug');
      }
      }
      }
     * 
     */

    private function getMaxSeq($farm_id) {
        //$this->autoRender = false;
        $query = $this->FarmHerdsmans->find()
                ->where(['FarmHerdsmans.farm_id' => $farm_id]);

        $max = $query->select(['count' => $query->func()->count('*')]);
        $data = $max->first();
        //debug($data);
        $count = $data['count'] + 1;
        //debug($count);
        return $count;
    }

    /**
     * Delete method
     *
     * @param string|null $id Farm Herdsman id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $farm_id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $farmHerdsman = $this->FarmHerdsmans->get($id);
        if ($this->FarmHerdsmans->delete($farmHerdsman)) {
            $this->Flash->success(__('ลบผู้เลี้ยงเรียบร้อย'));
        } else {
            $this->Flash->error(__('ไม่สามารถลบได้'));
        }

        return $this->redirect(['action' => 'index', $farm_id]);
    }

}
