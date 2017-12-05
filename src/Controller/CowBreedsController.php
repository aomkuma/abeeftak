<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CowBreeds Controller
 *
 * @property \App\Model\Table\CowBreedsTable $CowBreeds
 *
 * @method \App\Model\Entity\CowBreed[] paginate($object = null, array $settings = [])
 */
class CowBreedsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $cowBreeds = $this->paginate($this->CowBreeds);

        $this->set(compact('cowBreeds'));
        $this->set('_serialize', ['cowBreeds']);
    }

    /**
     * View method
     *
     * @param string|null $id Cow Breed id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cowBreed = $this->CowBreeds->get($id, [
            'contain' => ['Cows']
        ]);

        $this->set('cowBreed', $cowBreed);
        $this->set('_serialize', ['cowBreed']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cowBreed = $this->CowBreeds->newEntity();
        if ($this->request->is('post')) {
            $cowBreed = $this->CowBreeds->patchEntity($cowBreed, $this->request->getData());
            if ($this->CowBreeds->save($cowBreed)) {
                $this->Flash->success(__('The cow breed has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cow breed could not be saved. Please, try again.'));
        }
        $this->set(compact('cowBreed'));
        $this->set('_serialize', ['cowBreed']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cow Breed id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cowBreed = $this->CowBreeds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cowBreed = $this->CowBreeds->patchEntity($cowBreed, $this->request->getData());
            if ($this->CowBreeds->save($cowBreed)) {
                $this->Flash->success(__('The cow breed has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cow breed could not be saved. Please, try again.'));
        }
        $this->set(compact('cowBreed'));
        $this->set('_serialize', ['cowBreed']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cow Breed id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cowBreed = $this->CowBreeds->get($id);
        if ($this->CowBreeds->delete($cowBreed)) {
            $this->Flash->success(__('The cow breed has been deleted.'));
        } else {
            $this->Flash->error(__('The cow breed could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
