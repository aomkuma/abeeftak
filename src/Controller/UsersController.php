<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\View\Helper\SessionHelper;
use Cake\Network\Session\DatabaseSession;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {

        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users, array('limit' => 10));




        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
        // $this->paginate($members, array('limit' => 10));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $title = ['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว'];
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
        $this->set('title', $title);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
        $title = ['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว'];
        $this->set('title', $title);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        // $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $user = $this->Users->get($user['id']);
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'users', 'action' => 'index']);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function searchuser() {

      $names = $this->request->data('txtSearch');

        if ($names != '') {

            $names = '%' . $this->request->data('txtSearch') . '%';


            $query = $this->Users->find('all', [
                'conditions' => ['firstname LIKE ' => $names],
                'contain' => ['Roles']
            ]);
            $this->request->session()->write('names', $names);
            $users = $this->paginate($query, array('limit' => 1));

            $this->set(compact('users'));
            $this->set('_serialize', ['users']);

            $sess = $this->request->session()->read('names');
        } else {
            $sess = $this->request->session()->read('names');

            $query = $this->Users->find('all', [
                'conditions' => ['firstname LIKE ' => $sess],
                'contain' => ['Roles']
            ]);

            $users = $this->paginate($query, array('limit' => 1));
            $this->set(compact('users'));
            $this->set('_serialize', ['users']);
        }
    }

}
