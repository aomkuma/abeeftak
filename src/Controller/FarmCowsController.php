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
class FarmCowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Farms', 'Cows']
        ];
        $farmCows = $this->paginate($this->FarmCows);

        $this->set(compact('farmCows'));
        $this->set('_serialize', ['farmCows']);
    }

    /**
     * View method
     *
     * @param string|null $id Farm Cow id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $farmCow = $this->FarmCows->get($id, [
            'contain' => ['Farms', 'Cows']
        ]);

        $this->set('farmCow', $farmCow);
        $this->set('_serialize', ['farmCow']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $farmCow = $this->FarmCows->newEntity();
        if ($this->request->is('post')) {
            $farmCow = $this->FarmCows->patchEntity($farmCow, $this->request->getData());
            if ($this->FarmCows->save($farmCow)) {
                $this->Flash->success(__('The farm cow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The farm cow could not be saved. Please, try again.'));
        }
        $farms = $this->FarmCows->Farms->find('list', ['limit' => 200]);
        $cows = $this->FarmCows->Cows->find('list', ['limit' => 200]);
        $this->set(compact('farmCow', 'farms', 'cows'));
        $this->set('_serialize', ['farmCow']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Farm Cow id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $farmCow = $this->FarmCows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $farmCow = $this->FarmCows->patchEntity($farmCow, $this->request->getData());
            if ($this->FarmCows->save($farmCow)) {
                $this->Flash->success(__('The farm cow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The farm cow could not be saved. Please, try again.'));
        }
        $farms = $this->FarmCows->Farms->find('list', ['limit' => 200]);
        $cows = $this->FarmCows->Cows->find('list', ['limit' => 200]);
        $this->set(compact('farmCow', 'farms', 'cows'));
        $this->set('_serialize', ['farmCow']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Farm Cow id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
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
