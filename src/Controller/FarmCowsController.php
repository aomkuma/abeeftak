<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * FarmCows Controller
 *
 * @property \App\Model\Table\FarmCowsTable $FarmCows
 *
 * @method \App\Model\Entity\FarmCow[] paginate($object = null, array $settings = [])
 */
class FarmCowsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->viewBuilder()->layout('clean_layout');
        $this->paginate = [
            'contain' => ['Farms', 'Cows']
        ];
        $farmCows = $this->paginate($this->FarmCows);

        $this->set(compact('farmCows'));
        $this->set('_serialize', ['farmCows']);
    }

    public function addcow() {
        $this->autoRender = false;
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $farmCows = $this->FarmCows->newEntity();


            $data = [];
            $postData = $this->request->getData();
            $postData = $postData['data'];
            //$this->log($postData,'debug');
            parse_str($postData, $data);
            //$this->log($data,'debug');

            $farmCows->farm_id = $data['farm_id'];
            $farmCows->cow_id = $data['cow_id'];
            $farmCows->description = $data['description'];

            $result = $this->FarmCows->save($farmCows);
            if ($result) {
                
            }
        }
    }
    /**
     * Delete method
     *
     * @param string|null $id Farm Cow id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $farmCow = $this->FarmCows->get($id);
        if ($this->FarmCows->delete($farmCow)) {
            $this->Flash->success(__('The farm cow has been deleted.'));
        } else {
            $this->Flash->error(__('The farm cow could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
