<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BreedingRecords Controller
 *
 * @property \App\Model\Table\BreedingRecordsTable $BreedingRecords
 *
 * @method \App\Model\Entity\BreedingRecord[] paginate($object = null, array $settings = [])
 */
class BreedingRecordsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $breedingRecords = $this->paginate($this->BreedingRecords);

        $this->set(compact('breedingRecords'));
        $this->set('_serialize', ['breedingRecords']);
    }

    /**
     * View method
     *
     * @param string|null $id Breeding Record id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $breedingRecord = $this->BreedingRecords->get($id, [
            'contain' => []
        ]);

        $this->set('breedingRecord', $breedingRecord);
        $this->set('_serialize', ['breedingRecord']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $breedingRecord = $this->BreedingRecords->newEntity();
        if ($this->request->is('post')) {
            $breedingRecord = $this->BreedingRecords->patchEntity($breedingRecord, $this->request->getData());
            if ($this->BreedingRecords->save($breedingRecord)) {
                $this->Flash->success(__('The breeding record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The breeding record could not be saved. Please, try again.'));
        }
        $this->set(compact('breedingRecord'));
        $this->set('_serialize', ['breedingRecord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Breeding Record id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $breedingRecord = $this->BreedingRecords->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $breedingRecord = $this->BreedingRecords->patchEntity($breedingRecord, $this->request->getData());
            if ($this->BreedingRecords->save($breedingRecord)) {
                $this->Flash->success(__('The breeding record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The breeding record could not be saved. Please, try again.'));
        }
        $this->set(compact('breedingRecord'));
        $this->set('_serialize', ['breedingRecord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Breeding Record id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $breedingRecord = $this->BreedingRecords->get($id);
        if ($this->BreedingRecords->delete($breedingRecord)) {
            $this->Flash->success(__('The breeding record has been deleted.'));
        } else {
            $this->Flash->error(__('The breeding record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
