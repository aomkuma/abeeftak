<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Runnings Controller
 *
 * @property \App\Model\Table\RunningsTable $Runnings
 *
 * @method \App\Model\Entity\Running[] paginate($object = null, array $settings = [])
 */
class RunningsController extends AppController {

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
        $runnings = $this->paginate($this->Runnings);

        $this->set(compact('runnings'));
        $this->set('_serialize', ['runnings']);
    }

    /**
     * View method
     *
     * @param string|null $id Running id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $running = $this->Runnings->get($id, [
            'contain' => []
        ]);

        $this->set('running', $running);
        $this->set('_serialize', ['running']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $running = $this->Runnings->newEntity();
        if ($this->request->is('post')) {
            $running = $this->Runnings->patchEntity($running, $this->request->getData());
            if ($this->Runnings->save($running)) {
                $this->Flash->success(__('The running has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The running could not be saved. Please, try again.'));
        }
        $this->set(compact('running'));
        $this->set('_serialize', ['running']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Running id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $running = $this->Runnings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $running = $this->Runnings->patchEntity($running, $this->request->getData());
            if ($this->Runnings->save($running)) {
                $this->Flash->success(__('The running has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The running could not be saved. Please, try again.'));
        }
        $this->set(compact('running'));
        $this->set('_serialize', ['running']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Running id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $running = $this->Runnings->get($id);
        if ($this->Runnings->delete($running)) {
            $this->Flash->success(__('The running has been deleted.'));
        } else {
            $this->Flash->error(__('The running could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
