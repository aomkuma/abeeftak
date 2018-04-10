<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[] paginate($object = null, array $settings = [])
 */
class RolesController extends AppController {

    public $Controllers = null;
    public $RoleAccesses = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Controllers = TableRegistry::get('Controllers');
        $this->RoleAccesses = TableRegistry::get('RoleAccesses');
         $control = strtolower($this->request->params['controller']);
        $action = strtolower($this->request->params['action']);
        //$this->loadComponent('Authen');
       //$ckPermission= $this->Authen->authen($action,$control);
        ///debug($ckPermission);
//      
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
        $this->set('_serialize', ['roles']);
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $role = $this->Roles->get($id, [
            'contain' => ['RoleAccesses', 'Users']
        ]);

        $this->set('role', $role);
        $this->set('_serialize', ['role']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $role = $this->Roles->newEntity();
        $getname = $this->request->session()->read('Auth.User');
        if ($this->request->is('post')) {

            ////////////section role////////////
            //  $role = $this->Roles->patchEntity($role, $this->request->getData());
            $role = $this->Roles->newEntity();
            $role->name = $this->request->getData('name');
            $role->isactive = $this->request->getData('isactive');
            $role->description = $this->request->getData('description');
            $role->createdby = $getname['firstname'] . ' ' . $getname['lastname'];
            $role->updatedby = '';
            $this->Roles->save($role);

            ///////////section role access ////////////
            $roleid = $role->id;
            $act = $this->request->data['action'];


            foreach ($act as $controller):

                if ($controller['action_id'] != '0') {
                    $roleAccess = $this->RoleAccesses->newEntity();
                    $roleAccess->role_id = $roleid;
                    $roleAccess->action_id = $controller['action_id'];
                    $roleAccess->createdby = 'uan';


                    $this->RoleAccesses->save($roleAccess);
                }
            endforeach;
            return $this->redirect(['action' => 'index']);
        }
        $isactive = ['Y' => 'Y', 'N' => 'N'];
        $this->set(compact('role'));
        $this->set('_serialize', ['role']);
        $this->set('isactive', $isactive);

        $query = $this->Controllers->find('all', ['contain' => ['Actions']]);
        $actions = $query->toArray();

        $this->set(compact('actions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $getname = $this->request->session()->read('Auth.User');
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        $roleid = "'" . $id . "'";
        $query = $this->Controllers->find('all', ['contain' => ['Actions' => ['RoleAccesses' => [
                        'conditions' => ['RoleAccesses.role_id' => $id]]
        ]]]);
        $actions = $query->toArray();


        $queryro = $this->RoleAccesses->find('all', [
            'conditions' => ['role_id=' . $roleid]
        ]);
        $roleAccess = $queryro->toArray();



        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            $role['updatedby'] = $getname['firstname'] . ' ' . $getname['lastname'];
            $this->Roles->save($role);


            foreach ($roleAccess as $roleAcc):

                $this->RoleAccesses->delete($roleAcc);
            endforeach;
//////////////////////////////////////////////////////

            $roleid = $role->id;
            $act = $this->request->data['action'];


            foreach ($act as $controller):

                if ($controller['action_id'] != '0') {
                    $roleAccess = $this->RoleAccesses->newEntity();
                    $roleAccess->role_id = $roleid;
                    $roleAccess->action_id = $controller['action_id'];
                    $roleAccess->createdby = 'uan';


                    $this->RoleAccesses->save($roleAccess);
                }
            endforeach;




            ////////////////////////////////


            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('role', 'actions'));
        $this->set('_serialize', ['role']);
        $isactive = ['Y' => 'Y', 'N' => 'N'];
        $this->set('isactive', $isactive);
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        // $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
