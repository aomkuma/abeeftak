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
    public $GrowthRecords = null;
    public $Images = null;
    public $CowImages = null;    

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->CowBreeds = TableRegistry::get('CowBreeds');
        $this->GrowthRecords = TableRegistry::get('GrowthRecords');
        $this->Images =  TableRegistry::get('Images');
        $this->CowImages =  TableRegistry::get('CowImages');
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
            'contain' => ['CowBreeds', 'MovementRecords', 'TreatmentRecords','GrowthRecords', 'BreedingRecords', 'GivebirthRecords', 'CowImages'=>['Images']]
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
            $cow->code = 'TAK6000001';
            $cow->cow_breed_id = $cow_id;

            $cow->updatedby = 'bbb';
        }
        $cow->breed_level = $Cow['breed_level'];
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
            $result['DATA']['ID'] = $cow->id;
        }else{
            debug($cow->errors());
            $result = 'fail to update';
        }

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function saveWean(){
        $this->autoRender = false;

        $obj = $this->request->getData();
        $weans = $obj['Wean'];
        $cow_id = $obj['cow_id'];
        // print_r($weans);
        // exit;
        if(empty($weans['id'])){
            $Wean = $this->GrowthRecords->newEntity();
            $Wean->type = 'W';
            $Wean->createdby = 'aaa';
            $Wean->cow_id = $cow_id;
        }else{
            $Wean = $this->GrowthRecords->get($weans['id']);
            $Wean->updatedby = 'bbb';
        }

        $Wean->weight = $weans['weight'];
        $Wean->chest = $weans['chest'];
        $Wean->height = $weans['height'];
        $Wean->length = $weans['length'];
        $Wean->weight1 = $weans['weight1'];
        $Wean->chest1 = $weans['chest1'];
        $Wean->height1 = $weans['height1'];
        $Wean->length1 = $weans['length1'];
        $Wean->growth_stat = $weans['growth_stat'];
        
        if($this->GrowthRecords->save($Wean)){
            $result['DATA']['ID'] = $Wean->id;
        }else{
            debug($Wean->errors());
            $result = 'fail to update';
        }

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;

    }

    public function saveFertilize(){
        $this->autoRender = false;

        $obj = $this->request->getData();
        $fertilizes = $obj['Fertilize'];
        $cow_id = $obj['cow_id'];
        // print_r($fertilizes);
        // exit;
        if(empty($fertilizes['id'])){
            $Fertilize = $this->GrowthRecords->newEntity();
            $Fertilize->type = 'F';
            $Fertilize->createdby = 'aaa';
            $Fertilize->cow_id = $cow_id;
            $action_type='ADD';
        }else{
            $Fertilize = $this->GrowthRecords->get($fertilizes['id']);
            $Fertilize->updatedby = 'bbb';
        }

        $Fertilize->record_date = $fertilizes['record_date'];
        $Fertilize->age = $fertilizes['age'];
        $Fertilize->food_type = $fertilizes['food_type'];
        $Fertilize->total_eating = $fertilizes['total_eating'];
        $Fertilize->weight = $fertilizes['weight'];
        $Fertilize->chest = $fertilizes['chest'];
        $Fertilize->height = $fertilizes['height'];
        $Fertilize->length = $fertilizes['length'];
        $Fertilize->growth_stat = $fertilizes['growth_stat'];
        
        if($this->GrowthRecords->save($Fertilize)){
            $result['DATA']['ACTION'] = $action_type;
            $result['DATA']['ID'] = $Fertilize->id;
            $result['DATA']['obj'] = $Fertilize;
        }else{
            debug($Fertilize->errors());
            $result = 'fail to update';
        }

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;

    }

    public function deleteFertilize(){
        $this->autoRender = false;

        $obj = $this->request->getData();
        $id = $obj['id'];

        $entity = $this->GrowthRecords->get($id);
        $res = $this->GrowthRecords->delete($entity);
        $result['DATA']['DeleteStatus'] = $res;

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;

    }

    public function uploadImage(){
        $this->autoRender = false;

        $obj = $this->request->getData();
        // print_r($obj);
        // exit;
        $file = $obj['uploadObj']['imageObj'];
        $cow_id = $obj['uploadObj']['cow_id'];

        $WWW_ROOT = WWW_ROOT;
        $WWW_ROOT = str_replace('\\','/', $WWW_ROOT);
        $img_path = $WWW_ROOT . 'upload/img/';
        // echo $WWW_ROOT . 'upload/img/' . $file['name'];
        // exit;
        if(move_uploaded_file($file['tmp_name'], $img_path . $file['name'])){
            // insert table image
            $images = $this->Images->newEntity();
            $images->name = $file['name'];
            $images->type = 'cows';
            $images->path = $img_path;
            if($this->Images->save($images)){
                $img_id = $images->id;
                $result['DATA']['ImgID'] = $img_id;
                // Insert cows image
                $cow_images = $this->CowImages->newEntity();
                $cow_images->cow_id = $cow_id;
                $cow_images->image_id = $img_id;
                $this->CowImages->save($cow_images);
            }
        }else{
            $result = 'Upload failed';
        }

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }
}
