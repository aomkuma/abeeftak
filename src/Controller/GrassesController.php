<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Grasses Controller
 *
 * @property \App\Model\Table\GrassesTable $Grasses
 *
 * @method \App\Model\Entity\Grass[] paginate($object = null, array $settings = [])
 */
class GrassesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $grasses = $this->paginate($this->Grasses);

        $this->set(compact('grasses'));
        $this->set('_serialize', ['grasses']);
    }

    /**
     * View method
     *
     * @param string|null $id Grass id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $grass = $this->Grasses->get($id, [
            'contain' => []
        ]);

        $this->set('grass', $grass);
        $this->set('_serialize', ['grass']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $grass = $this->Grasses->newEntity();
        if ($this->request->is('post')) {
            $grass = $this->Grasses->patchEntity($grass, $this->request->getData());
            if ($this->Grasses->save($grass)) {
                $this->Flash->success('บันทึก '.$grass->name.' เรียบร้อย');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grass could not be saved. Please, try again.'));
        }
        $this->set(compact('grass'));
        $this->set('_serialize', ['grass']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grass id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grass = $this->Grasses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grass = $this->Grasses->patchEntity($grass, $this->request->getData());
            if ($this->Grasses->save($grass)) {
                $this->Flash->success(__('The grass has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grass could not be saved. Please, try again.'));
        }
        $this->set(compact('grass'));
        $this->set('_serialize', ['grass']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grass id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grass = $this->Grasses->get($id);
        if ($this->Grasses->delete($grass)) {
            $this->Flash->success(__('The grass has been deleted.'));
        } else {
            $this->Flash->error(__('The grass could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
