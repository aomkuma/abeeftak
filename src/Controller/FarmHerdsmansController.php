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

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->FarmHerdsmans = TableRegistry::get('FarmHerdsmans');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($farm_id = null) {
        $this->viewBuilder()->layout('clean_layout');
        $query = $this->FarmHerdsmans->find()
                ->contain(['Herdsmans'])
                ->where(['FarmHerdsmans.farm_id'=>$farm_id])
                ->order(['FarmHerdsmans.seq'=>'ASC']);
        $farmHerdsmans = $query->toArray();

        $this->set(compact('farmHerdsmans'));
        $this->set('_serialize', ['farmHerdsmans']);
    }

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

    private function getMaxSeq($farm_id) {
        //$this->autoRender = false;
        $query = $this->FarmHerdsmans->find()
                ->where(['FarmHerdsmans.farm_id' => $farm_id]);
        
        $max = $query->select(['count' => $query->func()->count('*')]);
        $data = $max->first();
        //debug($data);
        $count = $data['count']+1;
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
    public function delete($id = null,$farm_id=null) {
        $this->request->allowMethod(['post', 'delete']);
        $farmHerdsman = $this->FarmHerdsmans->get($id);
        if ($this->FarmHerdsmans->delete($farmHerdsman)) {
            //$this->Flash->success(__('The farm herdsman has been deleted.'));
        } else {
            //$this->Flash->error(__('The farm herdsman could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index',$farm_id]);
    }

}
