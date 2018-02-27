<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Actions Controller
 *
 * @property \App\Model\Table\ActionsTable $Actions
 *
 * @method \App\Model\Entity\Action[] paginate($object = null, array $settings = [])
 */
class ActionsController extends AppController {

    public $controll = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->controll = TableRegistry::get('controllers');
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
        /////////////////
//        $controll = $this->controll->find('all');
//        $con = $controll->toArray();
//        $action = ['add', 'edit', 'index', 'view'];
//
//        for ($i = 0; $i < sizeof($con); $i++) {
//            for ($j = 0; $j < sizeof($action); $j++) {
//                $ac = $this->Actions->newEntity();
//                $ac->name = $con[$i]['name'] .'-'. $action[$j];
//                $ac->value = $action[$j];
//                $ac->controller_id = $con[$i]['id'];
//                $ac->description = 'note';
//                $ac->createdby = 'uan';
//                $ac->updatedby = 'uan';
//                 $this->Actions->save($ac);
//            }
//        }
        //////////////////////

        $this->paginate = [
            'contain' => ['Controllers']
        ];
        $actions = $this->paginate($this->Actions);

        $this->set(compact('actions'));
        $this->set('_serialize', ['actions']);
    }

    /**
     * View method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $action = $this->Actions->get($id, [
            'contain' => ['Controllers', 'RoleAccesses']
        ]);

        $this->set('action', $action);
        $this->set('_serialize', ['action']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $value = [];
        $conid = [];
        $action = $this->Actions->newEntity();
        if ($this->request->is('post')) {
            $action = $this->Actions->patchEntity($action, $this->request->getData());
            if ($this->Actions->save($action)) {
                $this->Flash->success(__('The action has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The action could not be saved. Please, try again.'));
        }
        $controllers = $this->Actions->Controllers->find('list', ['limit' => 200]);
        $this->set(compact('action', 'controllers'));
        $this->set('_serialize', ['action']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $action = $this->Actions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $action = $this->Actions->patchEntity($action, $this->request->getData());
            if ($this->Actions->save($action)) {
                $this->Flash->success(__('The action has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The action could not be saved. Please, try again.'));
        }
        $controllers = $this->Actions->Controllers->find('list', ['limit' => 200]);
        $this->set(compact('action', 'controllers'));
        $this->set('_serialize', ['action']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $action = $this->Actions->get($id);
        if ($this->Actions->delete($action)) {
            $this->Flash->success(__('The action has been deleted.'));
        } else {
            $this->Flash->error(__('The action could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
