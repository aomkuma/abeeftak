<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FarmHerdsmans Controller
 *
 * @property \App\Model\Table\FarmHerdsmansTable $FarmHerdsmans
 *
 * @method \App\Model\Entity\FarmHerdsman[] paginate($object = null, array $settings = [])
 */
class FarmHerdsmansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Farms', 'Herdsmen']
        ];
        $farmHerdsmans = $this->paginate($this->FarmHerdsmans);

        $this->set(compact('farmHerdsmans'));
        $this->set('_serialize', ['farmHerdsmans']);
    }

    /**
     * View method
     *
     * @param string|null $id Farm Herdsman id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $farmHerdsman = $this->FarmHerdsmans->get($id, [
            'contain' => ['Farms', 'Herdsmen']
        ]);

        $this->set('farmHerdsman', $farmHerdsman);
        $this->set('_serialize', ['farmHerdsman']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $farmHerdsman = $this->FarmHerdsmans->newEntity();
        if ($this->request->is('post')) {
            $farmHerdsman = $this->FarmHerdsmans->patchEntity($farmHerdsman, $this->request->getData());
            if ($this->FarmHerdsmans->save($farmHerdsman)) {
                $this->Flash->success(__('The farm herdsman has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The farm herdsman could not be saved. Please, try again.'));
        }
        $farms = $this->FarmHerdsmans->Farms->find('list', ['limit' => 200]);
        $herdsmen = $this->FarmHerdsmans->Herdsmen->find('list', ['limit' => 200]);
        $this->set(compact('farmHerdsman', 'farms', 'herdsmen'));
        $this->set('_serialize', ['farmHerdsman']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Farm Herdsman id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $farmHerdsman = $this->FarmHerdsmans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $farmHerdsman = $this->FarmHerdsmans->patchEntity($farmHerdsman, $this->request->getData());
            if ($this->FarmHerdsmans->save($farmHerdsman)) {
                $this->Flash->success(__('The farm herdsman has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The farm herdsman could not be saved. Please, try again.'));
        }
        $farms = $this->FarmHerdsmans->Farms->find('list', ['limit' => 200]);
        $herdsmen = $this->FarmHerdsmans->Herdsmen->find('list', ['limit' => 200]);
        $this->set(compact('farmHerdsman', 'farms', 'herdsmen'));
        $this->set('_serialize', ['farmHerdsman']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Farm Herdsman id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $farmHerdsman = $this->FarmHerdsmans->get($id);
        if ($this->FarmHerdsmans->delete($farmHerdsman)) {
            $this->Flash->success(__('The farm herdsman has been deleted.'));
        } else {
            $this->Flash->error(__('The farm herdsman could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
