<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MovementRecords Controller
 *
 * @property \App\Model\Table\MovementRecordsTable $MovementRecords
 *
 * @method \App\Model\Entity\MovementRecord[] paginate($object = null, array $settings = [])
 */
class MovementRecordsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cows']
        ];
        $movementRecords = $this->paginate($this->MovementRecords);

        $this->set(compact('movementRecords'));
        $this->set('_serialize', ['movementRecords']);
    }

    /**
     * View method
     *
     * @param string|null $id Movement Record id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movementRecord = $this->MovementRecords->get($id, [
            'contain' => ['Cows']
        ]);

        $this->set('movementRecord', $movementRecord);
        $this->set('_serialize', ['movementRecord']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movementRecord = $this->MovementRecords->newEntity();
        if ($this->request->is('post')) {
            $movementRecord = $this->MovementRecords->patchEntity($movementRecord, $this->request->getData());
            if ($this->MovementRecords->save($movementRecord)) {
                $this->Flash->success(__('The movement record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movement record could not be saved. Please, try again.'));
        }
        $cows = $this->MovementRecords->Cows->find('list', ['limit' => 200]);
        $this->set(compact('movementRecord', 'cows'));
        $this->set('_serialize', ['movementRecord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Movement Record id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movementRecord = $this->MovementRecords->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movementRecord = $this->MovementRecords->patchEntity($movementRecord, $this->request->getData());
            if ($this->MovementRecords->save($movementRecord)) {
                $this->Flash->success(__('The movement record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movement record could not be saved. Please, try again.'));
        }
        $cows = $this->MovementRecords->Cows->find('list', ['limit' => 200]);
        $this->set(compact('movementRecord', 'cows'));
        $this->set('_serialize', ['movementRecord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Movement Record id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movementRecord = $this->MovementRecords->get($id);
        if ($this->MovementRecords->delete($movementRecord)) {
            $this->Flash->success(__('The movement record has been deleted.'));
        } else {
            $this->Flash->error(__('The movement record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
