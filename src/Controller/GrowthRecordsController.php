<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * GrowthRecords Controller
 *
 * @property \App\Model\Table\GrowthRecordsTable $GrowthRecords
 *
 * @method \App\Model\Entity\GrowthRecord[] paginate($object = null, array $settings = [])
 */
class GrowthRecordsController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $growthRecords = $this->paginate($this->GrowthRecords);

        $this->set(compact('growthRecords'));
        $this->set('_serialize', ['growthRecords']);
    }

    /**
     * View method
     *
     * @param string|null $id Growth Record id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $growthRecord = $this->GrowthRecords->get($id, [
            'contain' => []
        ]);

        $this->set('growthRecord', $growthRecord);
        $this->set('_serialize', ['growthRecord']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $growthRecord = $this->GrowthRecords->newEntity();
        if ($this->request->is('post')) {
            $growthRecord = $this->GrowthRecords->patchEntity($growthRecord, $this->request->getData());
            if ($this->GrowthRecords->save($growthRecord)) {
                $this->Flash->success(__('The growth record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The growth record could not be saved. Please, try again.'));
        }
        $this->set(compact('growthRecord'));
        $this->set('_serialize', ['growthRecord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Growth Record id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $growthRecord = $this->GrowthRecords->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $growthRecord = $this->GrowthRecords->patchEntity($growthRecord, $this->request->getData());
            if ($this->GrowthRecords->save($growthRecord)) {
                $this->Flash->success(__('The growth record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The growth record could not be saved. Please, try again.'));
        }
        $this->set(compact('growthRecord'));
        $this->set('_serialize', ['growthRecord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Growth Record id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $growthRecord = $this->GrowthRecords->get($id);
        if ($this->GrowthRecords->delete($growthRecord)) {
            $this->Flash->success(__('The growth record has been deleted.'));
        } else {
            $this->Flash->error(__('The growth record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
