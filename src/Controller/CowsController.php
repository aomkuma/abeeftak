<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cows Controller
 *
 * @property \App\Model\Table\CowsTable $Cows
 *
 * @method \App\Model\Entity\Cow[] paginate($object = null, array $settings = [])
 */
class CowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CowBreeds']
        ];
        $cows = $this->paginate($this->Cows);

        $this->set(compact('cows'));
        $this->set('_serialize', ['cows']);
    }

    /**
     * View method
     *
     * @param string|null $id Cow id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cow = $this->Cows->get($id, [
            'contain' => ['CowBreeds', 'CowImages', 'MovementRecords', 'TreatmentRecords']
        ]);

        $this->set('cow', $cow);
        $this->set('_serialize', ['cow']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cow = $this->Cows->newEntity();
        if ($this->request->is('post')) {
            $cow = $this->Cows->patchEntity($cow, $this->request->getData());
            if ($this->Cows->save($cow)) {
                $this->Flash->success(__('The cow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cow could not be saved. Please, try again.'));
        }
        $cowBreeds = $this->Cows->CowBreeds->find('list', ['limit' => 200]);
        $this->set(compact('cow', 'cowBreeds'));
        $this->set('_serialize', ['cow']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cow id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cow = $this->Cows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cow = $this->Cows->patchEntity($cow, $this->request->getData());
            if ($this->Cows->save($cow)) {
                $this->Flash->success(__('The cow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cow could not be saved. Please, try again.'));
        }
        $cowBreeds = $this->Cows->CowBreeds->find('list', ['limit' => 200]);
        $this->set(compact('cow', 'cowBreeds'));
        $this->set('_serialize', ['cow']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cow id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cow = $this->Cows->get($id);
        if ($this->Cows->delete($cow)) {
            $this->Flash->success(__('The cow has been deleted.'));
        } else {
            $this->Flash->error(__('The cow could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
