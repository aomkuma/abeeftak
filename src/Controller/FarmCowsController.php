<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\I18n\Time;
/**
 * FarmCows Controller
 *
 * @property \App\Model\Table\FarmCowsTable $FarmCows
 *
 * @method \App\Model\Entity\FarmCow[] paginate($object = null, array $settings = [])
 */
class FarmCowsController extends AppController {

    public $FarmCows = null;

     public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->FarmCows = TableRegistry::get('FarmCows');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($farm_id =null) {
        $this->viewBuilder()->layout('clean_layout');
        $q = $this->FarmCows->find()
                ->contain(['Farms', 'Cows'])
                ->where(['FarmCows.isactive'=>'Y']);
        $farmCows = $q->toArray();
        
        $CowsModel = TableRegistry::get('Cows');

        $subquery = $this->FarmCows->find()
                ->select(['cow_id'])
                ->where(['isactive'=>'Y']);
        $q = $subquery->toArray();
        $ids = ['xx'];
        
        foreach ($q as $item) {
            array_push($ids, $item['cow_id']);
        }
        //debug($ids);
        $cows = $CowsModel->find('list', [
                    'keyField' => 'id', 'valueField' => 'code'
                ])
                ->where(['id NOT IN' => $ids]);
        
        $cows = $cows->toArray();
        //debug($cows);

        $this->set('cows', $cows);
        $this->set(compact('farmCows'));
        $this->set('farm_id', $farm_id);
        $this->set('_serialize', ['farmCows']);
    }

    public function addcow($farm_id) {
        $this->autoRender = false;
        if ($this->request->is(['patch', 'post', 'put'])) {
            //$this->FarmCows = TableRegistry::get('FarmCows');
            $farmCows = $this->FarmCows->newEntity();


            //$data = [];
            $data = $this->request->getData();
            //$postData = $postData['data'];
            //$this->log($postData,'debug');
            //parse_str($postData, $data);
            //$this->log($data,'debug');
            $this->log($data,'debug');
            $farmCows->farm_id = $data['farm_id'];
            $farmCows->cow_id = $data['cow_id'];
            //$farmCows->description = $data['description'];
            $farmCows->seq = $this->getMaxSeq($farmCows->farm_id);
            $farmCows->createdby = $this->request->session()->read('Auth.User.firstname');

            $result = $this->FarmCows->save($farmCows);
            if ($result) {
                
            }
        }
        return $this->redirect(['action' => 'index', $farm_id]);
    }
    
    public function movecow($id=null,$farm_id=null){
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        
        $farmCow = $this->FarmCows->get($id);
        if($farmCow != null){
            $farmCow->isactive = 'N';
            $farmCow->moveddate = Time::now();
            $farmCow->updatedby = $this->request->session()->read('Auth.User.firstname');
            $result = $this->FarmCows->save($farmCow);
            if ($result) {
                $this->Flash->success(__('ย้ายโคออกจากฟาร์มเรียบร้อย'));
            }
        }
        return $this->redirect(['action' => 'index', $farm_id]);
    }
    
    private function getMaxSeq($farm_id) {
        //$this->autoRender = false;
        $query = $this->FarmCows->find()
                ->where(['FarmCows.farm_id' => $farm_id]);
        
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
     * @param string|null $id Farm Cow id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$farm_id = null) {
        
        $this->request->allowMethod(['post', 'delete']);
        $this->log($id,'debug');
        $farmCow = $this->FarmCows->get($id);
        $this->log($farmCow,'debug');
        if ($this->FarmCows->delete($farmCow)) {
            $this->Flash->success(__('The farm cow has been deleted.'));
        } else {
            $this->Flash->error(__('The farm cow could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index',$farm_id]);
    }



}
