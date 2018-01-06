<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Controllers Controller
 *
 * @property \App\Model\Table\ControllersTable $Controllers
 *
 * @method \App\Model\Entity\Controller[] paginate($object = null, array $settings = [])
 */
class ControllersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $controllers = $this->paginate($this->Controllers);

        $this->set(compact('controllers'));
        $this->set('_serialize', ['controllers']);
    }

    /**
     * View method
     *
     * @param string|null $id Controller id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $controller = $this->Controllers->get($id, [
            'contain' => ['Actions']
        ]);

        $this->set('controller', $controller);
        $this->set('_serialize', ['controller']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
//        $name = ['Actions', 'Addresses', 'BreedingRecords', 'CowBreeds',
//            'CowImages', 'Cows', 'Farms', 'GivebirthRecords', 'GrowthRecords',
//            'Herdsmans', 'Home', 'Images', 'MovementRecords', 'Pages',
//            'RoleAccesses', 'Roles', 'TreatmentRecords', 'users'];
//        $namecon = ['ActionsController', 'AddressesController', 'BreedingRecordsController', 'CowBreedsController',
//            'CowImagesController', 'CowsController', 'FarmsController', 'GivebirthRecordsController', 'GrowthRecordsController',
//            'HerdsmansController', 'HomeController', 'ImagesController', 'MovementRecordsController', 'PagesController',
//            'RoleAccessesController', 'RolesController', 'TreatmentRecordsController', 'usersController'];

        $controller = $this->Controllers->newEntity();
        if ($this->request->is('post')) {
             $controller = $this->Controllers->patchEntity($controller, $this->request->getData());

//            for ($i = 0; $i < sizeof($namecon); $i++) {
//                $controller = $this->Controllers->newEntity();
//                $controller->name = $name[$i];
//                $controller->value = $namecon[$i];
//                $controller->description = 'note';
//                $controller->createdby = 'uan';
//                $controller->updatedby = 'uan';
//                $this->Controllers->save($controller);
//            }
            if ($this->Controllers->save($controller)) {
                $this->Flash->success(__('The controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The controller could not be saved. Please, try again.'));
        }
        $this->set(compact('controller'));
        $this->set('_serialize', ['controller']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Controller id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $controller = $this->Controllers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $controller = $this->Controllers->patchEntity($controller, $this->request->getData());
            if ($this->Controllers->save($controller)) {
                $this->Flash->success(__('The controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The controller could not be saved. Please, try again.'));
        }
        $this->set(compact('controller'));
        $this->set('_serialize', ['controller']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Controller id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $controller = $this->Controllers->get($id);
        if ($this->Controllers->delete($controller)) {
            $this->Flash->success(__('The controller has been deleted.'));
        } else {
            $this->Flash->error(__('The controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
