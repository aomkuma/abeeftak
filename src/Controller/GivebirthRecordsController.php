<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GivebirthRecords Controller
 *
 * @property \App\Model\Table\GivebirthRecordsTable $GivebirthRecords
 *
 * @method \App\Model\Entity\GivebirthRecord[] paginate($object = null, array $settings = [])
 */
class GivebirthRecordsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $givebirthRecords = $this->paginate($this->GivebirthRecords);

        $this->set(compact('givebirthRecords'));
        $this->set('_serialize', ['givebirthRecords']);
    }

    /**
     * View method
     *
     * @param string|null $id Givebirth Record id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $givebirthRecord = $this->GivebirthRecords->get($id, [
            'contain' => []
        ]);

        $this->set('givebirthRecord', $givebirthRecord);
        $this->set('_serialize', ['givebirthRecord']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $givebirthRecord = $this->GivebirthRecords->newEntity();
        if ($this->request->is('post')) {
            $givebirthRecord = $this->GivebirthRecords->patchEntity($givebirthRecord, $this->request->getData());
            if ($this->GivebirthRecords->save($givebirthRecord)) {
                $this->Flash->success(__('The givebirth record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The givebirth record could not be saved. Please, try again.'));
        }
        $this->set(compact('givebirthRecord'));
        $this->set('_serialize', ['givebirthRecord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Givebirth Record id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $givebirthRecord = $this->GivebirthRecords->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $givebirthRecord = $this->GivebirthRecords->patchEntity($givebirthRecord, $this->request->getData());
            if ($this->GivebirthRecords->save($givebirthRecord)) {
                $this->Flash->success(__('The givebirth record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The givebirth record could not be saved. Please, try again.'));
        }
        $this->set(compact('givebirthRecord'));
        $this->set('_serialize', ['givebirthRecord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Givebirth Record id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $givebirthRecord = $this->GivebirthRecords->get($id);
        if ($this->GivebirthRecords->delete($givebirthRecord)) {
            $this->Flash->success(__('The givebirth record has been deleted.'));
        } else {
            $this->Flash->error(__('The givebirth record could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
