<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Herdsmans Controller
 *
 * @property \App\Model\Table\HerdsmansTable $Herdsmans
 *
 * @method \App\Model\Entity\Herdsman[] paginate($object = null, array $settings = [])
 */
class HerdsmansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Addresses']
        ];
        $herdsmans = $this->paginate($this->Herdsmans);

        $this->set(compact('herdsmans'));
        $this->set('_serialize', ['herdsmans']);
    }

    /**
     * View method
     *
     * @param string|null $id Herdsman id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $herdsman = $this->Herdsmans->get($id, [
            'contain' => ['Addresses']
        ]);

        $this->set('herdsman', $herdsman);
        $this->set('_serialize', ['herdsman']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $herdsman = $this->Herdsmans->newEntity();
        if ($this->request->is('post')) {
            $herdsman = $this->Herdsmans->patchEntity($herdsman, $this->request->getData());
            if ($this->Herdsmans->save($herdsman)) {
                $this->Flash->success(__('The herdsman has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
        }
        $addresses = $this->Herdsmans->Addresses->find('list', ['limit' => 200]);
        $this->set(compact('herdsman', 'addresses'));
        $this->set('_serialize', ['herdsman']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Herdsman id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $herdsman = $this->Herdsmans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $herdsman = $this->Herdsmans->patchEntity($herdsman, $this->request->getData());
            if ($this->Herdsmans->save($herdsman)) {
                $this->Flash->success(__('The herdsman has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
        }
        $addresses = $this->Herdsmans->Addresses->find('list', ['limit' => 200]);
        $this->set(compact('herdsman', 'addresses'));
        $this->set('_serialize', ['herdsman']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Herdsman id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $herdsman = $this->Herdsmans->get($id);
        if ($this->Herdsmans->delete($herdsman)) {
            $this->Flash->success(__('The herdsman has been deleted.'));
        } else {
            $this->Flash->error(__('The herdsman could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
