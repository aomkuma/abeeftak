<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Cows Controller
 *
 * @property \App\Model\Table\CowsTable $Cows
 *
 * @method \App\Model\Entity\Cow[] paginate($object = null, array $settings = [])
 */
class CowsController extends AppController
{

    public $CowBreeds = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->CowBreeds = TableRegistry::get('CowBreeds');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //print_r($this->request);
        if(!empty($this->request->query['keyword'])){
            $keyword = $this->request->query['keyword'];
        }
        if(!empty($this->request->query['gender'])){
            $gender = $this->request->query['gender'];
        }

        $arr_con = [];
        if(!empty($keyword))
        {
            $arr_con[] = ['OR' => [['Cows.code LIKE ' => '%'.$keyword.'%'],['CowBreeds.name LIKE ' => '%'.$keyword.'%']]];
        }
        if(!empty($gender))
        {
            $arr_con[] = ['Cows.gender ' => $gender];
        }        
        
        $data = $this->Cows->find('all'
                    , ['conditions'=>$arr_con]
                );
        
        $this->paginate = [
            'contain' => ['CowBreeds']
        ];
        $cows = $this->paginate($data);

        $this->set(compact('keyword'));
        $this->set(compact('gender'));
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
        $this->set('id', $id);
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

    public function loadData(){
        $data = $this->Cows->get($this->request->data('cows_id'), [
            'contain' => ['CowBreeds', 'CowImages', 'MovementRecords', 'TreatmentRecords','GrowthRecords', 'BreedingRecords', 'GivebirthRecords']
        ]);

        $this->response->body(json_encode($data));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function saveCows(){
        $this->autoRender = false;
        $Cow = $this->request->getData();
        $CowBreed = $Cow['cow_breed'];
        unset($Cow['cow_breed']);
        unset($Cow['cow_images']);
        unset($Cow['growth_records']);
        unset($Cow['movement_records']);
        unset($Cow['treatment_records']);
        unset($Cow['givebirth_records']);
        // print_r($CowBreed);exit;

        if(empty($CowBreed['id'])){
            $CowBreeds = $this->CowBreeds->newEntity();
            $CowBreeds->createdby = 'aaa';
        }else{
            $CowBreeds = $this->CowBreeds->get($CowBreed['id']);
            $CowBreeds->updatedby = 'bbb';
        }
        $CowBreeds->name = $CowBreed['name'];
        
        $this->CowBreeds->save($CowBreeds);
        $cow_id = $CowBreeds->id;

        if(!empty($Cow['id'])){
            $cow = $this->Cows->get($Cow['id'], [
                'contain' => []
            ]);
            $cow->createdby = 'aaa';
        }else{
            $cow = $this->Cows->newEntity();
            $cow->code = 'TAK201700001';
            $cow->cow_breed_id = $cow_id;

            $cow->updatedby = 'bbb';
        }
        $cow->grade = $Cow['grade'];
        $cow->birthday = $Cow['birthday'];
        $cow->gender = $Cow['gender'];
        $cow->isbreeder = $Cow['isbreeder'];
        $cow->breeding = $Cow['breeding'];
        $cow->father_code = $Cow['father_code'];
        $cow->mother_code = $Cow['mother_code'];
        $cow->origins = $Cow['origins'];
        $cow->import_date = $Cow['import_date'];
        

        if($this->Cows->save($cow)){
            $result = $Cows->id;
        }else{
            debug($cow->errors());
            $result = 'fail to update';
        }
        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }
}
