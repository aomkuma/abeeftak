<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * RoleAccesses Controller
 *
 * @property \App\Model\Table\RoleAccessesTable $RoleAccesses
 *
 * @method \App\Model\Entity\RoleAccess[] paginate($object = null, array $settings = [])
 */
class RoleAccessesController extends AppController {

    public $Controllers = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Controllers = TableRegistry::get('Controllers');
         if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

   
    public function index() {
        $this->paginate = [
            'contain' => ['Roles', 'Actions']
        ];
        $roleAccesses = $this->paginate($this->RoleAccesses);

        $this->set(compact('roleAccesses'));
        $this->set('_serialize', ['roleAccesses']);
    }

    /**
     * View method
     *
     * @param string|null $id Role Access id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $roleAccess = $this->RoleAccesses->get($id, [
            'contain' => ['Roles', 'Actions']
        ]);

        $this->set('roleAccess', $roleAccess);
        $this->set('_serialize', ['roleAccess']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $roleAccess = $this->RoleAccesses->newEntity();
        if ($this->request->is('post')) {
            $roleid = $this->request->getData('role_id');
            $act = $this->request->data['action'];
            $getname = $this->request->session()->read('Auth.User');

            foreach ($act as $controller):
                if ($controller['action_id'] != 0) {
                    $roleAccess = $this->RoleAccesses->newEntity();
                    $roleAccess->role_id = $roleid;
                    $roleAccess->action_id = $controller['action_id'];
                    $roleAccess->createdby = $getname['firstname'].' '.$getname['lastname'];

                    if ($this->RoleAccesses->save($roleAccess)) {
                        pr('1');
                    }
                }


            endforeach;
            return $this->redirect(['action' => 'index']);
        }

        $roles = $this->RoleAccesses->Roles->find('list', ['limit' => 200]);

        $query = $this->Controllers->find('all', ['contain' => ['Actions']]);
        $actions = $query->toArray();

        $this->set(compact('roleAccess', 'roles', 'actions', 'title'));
        $this->set('_serialize', ['roleAccess']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Role Access id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $roleAccess = $this->RoleAccesses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $roleAccess = $this->RoleAccesses->patchEntity($roleAccess, $this->request->getData());
            
            if ($this->RoleAccesses->save($roleAccess)) {
                $this->Flash->success(__('The role access has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role access could not be saved. Please, try again.'));
        }
        $roles = $this->RoleAccesses->Roles->find('list', ['limit' => 200]);
        $actions = $this->RoleAccesses->Actions->find('list', ['limit' => 200]);
        $this->set(compact('roleAccess', 'roles', 'actions'));
        $this->set('_serialize', ['roleAccess']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Role Access id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $roleAccess = $this->RoleAccesses->get($id);
        if ($this->RoleAccesses->delete($roleAccess)) {
            $this->Flash->success(__('The role access has been deleted.'));
        } else {
            $this->Flash->error(__('The role access could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
