<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TreatmentRecords Controller
 *
 * @property \App\Model\Table\TreatmentRecordsTable $TreatmentRecords
 *
 * @method \App\Model\Entity\TreatmentRecord[] paginate($object = null, array $settings = [])
 */
class TreatmentRecordsController extends AppController
{
 
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
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cows']
        ];
        $treatmentRecords = $this->paginate($this->TreatmentRecords);

        $this->set(compact('treatmentRecords'));
        $this->set('_serialize', ['treatmentRecords']);
    }

    /**
     * View method
     *
     * @param string|null $id Treatment Record id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treatmentRecord = $this->TreatmentRecords->get($id, [
            'contain' => ['Cows']
        ]);

        $this->set('treatmentRecord', $treatmentRecord);
        $this->set('_serialize', ['treatmentRecord']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treatmentRecord = $this->TreatmentRecords->newEntity();
        if ($this->request->is('post')) {
            $treatmentRecord = $this->TreatmentRecords->patchEntity($treatmentRecord, $this->request->getData());
            if ($this->TreatmentRecords->save($treatmentRecord)) {
                $this->Flash->success(__('The treatment record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The treatment record could not be saved. Please, try again.'));
        }
        $cows = $this->TreatmentRecords->Cows->find('list', ['limit' => 200]);
        $this->set(compact('treatmentRecord', 'cows'));
        $this->set('_serialize', ['treatmentRecord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Treatment Record id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treatmentRecord = $this->TreatmentRecords->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treatmentRecord = $this->TreatmentRecords->patchEntity($treatmentRecord, $this->request->getData());
            if ($this->TreatmentRecords->save($treatmentRecord)) {
                $this->Flash->success(__('The treatment record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The treatment record could not be saved. Please, try again.'));
        }
        $cows = $this->TreatmentRecords->Cows->find('list', ['limit' => 200]);
        $this->set(compact('treatmentRecord', 'cows'));
        $this->set('_serialize', ['treatmentRecord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Treatment Record id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treatmentRecord = $this->TreatmentRecords->get($id);
        if ($this->TreatmentRecords->delete($treatmentRecord)) {
            $this->Flash->success(__('The treatment record has been deleted.'));
        } else {
            $this->Flash->error(__('The treatment record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
