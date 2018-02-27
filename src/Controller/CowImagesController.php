<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * CowImages Controller
 *
 * @property \App\Model\Table\CowImagesTable $CowImages
 *
 * @method \App\Model\Entity\CowImage[] paginate($object = null, array $settings = [])
 */
class CowImagesController extends AppController {

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
    public function index() {
        $this->paginate = [
            'contain' => ['Cows', 'Images']
        ];
        $cowImages = $this->paginate($this->CowImages);

        $this->set(compact('cowImages'));
        $this->set('_serialize', ['cowImages']);
    }

    /**
     * View method
     *
     * @param string|null $id Cow Image id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $cowImage = $this->CowImages->get($id, [
            'contain' => ['Cows', 'Images']
        ]);

        $this->set('cowImage', $cowImage);
        $this->set('_serialize', ['cowImage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $cowImage = $this->CowImages->newEntity();
        if ($this->request->is('post')) {
            $cowImage = $this->CowImages->patchEntity($cowImage, $this->request->getData());
            if ($this->CowImages->save($cowImage)) {
                $this->Flash->success(__('The cow image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cow image could not be saved. Please, try again.'));
        }
        $cows = $this->CowImages->Cows->find('list', ['limit' => 200]);
        $images = $this->CowImages->Images->find('list', ['limit' => 200]);
        $this->set(compact('cowImage', 'cows', 'images'));
        $this->set('_serialize', ['cowImage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cow Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $cowImage = $this->CowImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cowImage = $this->CowImages->patchEntity($cowImage, $this->request->getData());
            if ($this->CowImages->save($cowImage)) {
                $this->Flash->success(__('The cow image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cow image could not be saved. Please, try again.'));
        }
        $cows = $this->CowImages->Cows->find('list', ['limit' => 200]);
        $images = $this->CowImages->Images->find('list', ['limit' => 200]);
        $this->set(compact('cowImage', 'cows', 'images'));
        $this->set('_serialize', ['cowImage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cow Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $cowImage = $this->CowImages->get($id);
        if ($this->CowImages->delete($cowImage)) {
            $this->Flash->success(__('The cow image has been deleted.'));
        } else {
            $this->Flash->error(__('The cow image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
