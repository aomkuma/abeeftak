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
class CowsController extends AppController {

    public $CowBreeds = null;
    public $GrowthRecords = null;
    public $Images = null;
    public $CowImages = null;
    public $BreedingRecords = null;
    public $GivebirthRecords = null;
    public $MovementRecords = null;
    public $TreatmentRecords = null;
    public $Runnings = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->CowBreeds = TableRegistry::get('CowBreeds');
        $this->GrowthRecords = TableRegistry::get('GrowthRecords');
        $this->Images = TableRegistry::get('Images');
        $this->CowImages = TableRegistry::get('CowImages');
        $this->BreedingRecords = TableRegistry::get('BreedingRecords');
        $this->GivebirthRecords = TableRegistry::get('GivebirthRecords');
        $this->MovementRecords = TableRegistry::get('MovementRecords');
        $this->TreatmentRecords = TableRegistry::get('TreatmentRecords');
        $this->Runnings = TableRegistry::get('Runnings');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        //print_r($this->request);
        if (!empty($this->request->query['keyword'])) {
            $keyword = $this->request->query['keyword'];
        }
        if (!empty($this->request->query['gender'])) {
            $gender = $this->request->query['gender'];
        }

        $arr_con = [];
        if (!empty($keyword)) {
            $arr_con[] = ['OR' => [['Cows.code LIKE ' => '%' . $keyword . '%'], ['CowBreeds.name LIKE ' => '%' . $keyword . '%']]];
        }
        if (!empty($gender)) {
            $arr_con[] = ['Cows.gender ' => $gender];
        }

        $data = $this->Cows->find('all'
                , ['conditions' => $arr_con]
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
    public function view($id = null) {
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
    public function add() {
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
    public function edit($id = null) {
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
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $cow = $this->Cows->get($id);
        if ($this->Cows->delete($cow)) {
            $this->Flash->success(__('The cow has been deleted.'));
        } else {
            $this->Flash->error(__('The cow could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function loaddata() {
        $data = $this->Cows->get($this->request->data('cows_id'), [
            'contain' =>
            ['CowBreeds'
                , 'MovementRecords'
                , 'TreatmentRecords'
                , 'GrowthRecords'
                , 'BreedingRecords'
                , 'GivebirthRecords'
                , 'CowImages'
                => ['Images']
            ]
        ]);
        $result['DATA'] = $data;
        $result['OwnerRecord'] = $this->getCowOwnerRecord($this->request->data('cows_id'));
        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function saveCows() {
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

        if (empty($CowBreed['id'])) {
            $CowBreeds = $this->CowBreeds->newEntity();
            $CowBreeds->createdby = 'aaa';
            $CowBreeds->name = $CowBreed['name'];
        } else {
            $CowBreeds = $this->CowBreeds->get($CowBreed['id']);
            $CowBreeds->updatedby = 'bbb';
            $CowBreeds->name = $CowBreed['name'];
        }

        $this->CowBreeds->save($CowBreeds);
        $cow_id = $CowBreeds->id;

        if (!empty($Cow['id'])) {
            $cow = $this->Cows->get($Cow['id'], [
                'contain' => []
            ]);
            $cow->updatedby = $this->request->session()->read('Auth.User.firstname');
        } else {
            $cow = $this->Cows->newEntity();
            $cow->code = $this->genCode(); //'TAK6000001';
            $cow->cow_breed_id = $cow_id;

            $cow->createdby = $this->request->session()->read('Auth.User.firstname');
        }
        $cow->breed_level = $Cow['breed_level'];
        $cow->grade = $Cow['grade'];
        $cow->birthday = $this->convertDate($Cow['birthday']);
        $cow->gender = $Cow['gender'];
        $cow->isbreeder = $Cow['isbreeder'];
        $cow->breeding = $Cow['breeding'];
        $cow->father_code = $Cow['father_code'];
        $cow->mother_code = $Cow['mother_code'];
        $cow->origins = $Cow['origins'];
        $cow->import_date = $this->convertDate($Cow['import_date']);

        if ($this->Cows->save($cow)) {
            $result['DATA']['ID'] = $cow->id;
        } else {
            debug($cow->errors());
            $result = 'fail to update';
        }

        ob_end_clean();
        ob_end_flush();
        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    private function convertDate($d){
        $newDate = null;
        if(!empty($d)){
            $datetime = explode(' ', $d);
            $arr = explode('/', $datetime[0]);
            $date = str_pad($arr[0], 2, '0', STR_PAD_LEFT);
            $month = str_pad($arr[1], 2, '0', STR_PAD_LEFT);
            $year = intval($arr[2]) - 543;
            if(count($datetime) == 2){
                $time = ' ' . $datetime[1];
            }
            $dateStr = $year . '-' . $month . '-' . $date . $time;
            $newDate = date('Y-m-d', strtotime($dateStr));
        }
        return $newDate;
    }

    private function genCode() {
        $this->autoRender = false;
        $running = $this->Runnings->find('all')->where(['running_type' => 'COW']);

        $running = $running->toArray();
        $running = $running[0];
        $year = substr((date('Y') + 543), 2);
        $running_no = $running->running_no + 1;
        $number = str_pad($running_no, 5, '0', STR_PAD_LEFT);
        $code = $running->running_code . $year . $number;

        $running->running_no = $running_no;
        $this->Runnings->save($running);

        return $code;
    }

    public function saveWean() {
        $this->autoRender = false;

        $obj = $this->request->getData();
        $weans = $obj['Wean'];
        $cow_id = $obj['cow_id'];
        // print_r($weans);
        // exit;
        if (empty($weans['id'])) {
            $Wean = $this->GrowthRecords->newEntity();
            $Wean->type = 'W';
            $Wean->createdby = $this->request->session()->read('Auth.User.firstname');
            $Wean->cow_id = $cow_id;
        } else {
            $Wean = $this->GrowthRecords->get($weans['id']);
            $Wean->updated = date('Y-m-d H:i:s');
            $Wean->updatedby = $this->request->session()->read('Auth.User.firstname');
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

        if ($this->GrowthRecords->save($Wean)) {
            $result['DATA']['ID'] = $Wean->id;
        } else {
            debug($Wean->errors());
            $result = 'fail to update';
        }

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function saveFertilize() {
        $this->autoRender = false;

        $obj = $this->request->getData();
        $fertilizes = $obj['Fertilize'];
        $cow_id = $obj['cow_id'];
        // print_r($fertilizes);
        // exit;
        if (empty($fertilizes['id'])) {
            $Fertilize = $this->GrowthRecords->newEntity();
            $Fertilize->type = 'F';
            $Fertilize->createdby = $this->request->session()->read('Auth.User.firstname');
            $Fertilize->cow_id = $cow_id;
            $action_type = 'ADD';
        } else {
            $Fertilize = $this->GrowthRecords->get($fertilizes['id']);
            $Fertilize->updated = date('Y-m-d H:i:s');
            $Fertilize->updatedby = $this->request->session()->read('Auth.User.firstname');
        }

        $Fertilize->record_date = date('Y-m-d', strtotime($fertilizes['record_date']));
        $Fertilize->age = $fertilizes['age'];
        $Fertilize->food_type = $fertilizes['food_type'];
        $Fertilize->total_eating = $fertilizes['total_eating'];
        $Fertilize->weight = $fertilizes['weight'];
        $Fertilize->chest = $fertilizes['chest'];
        $Fertilize->height = $fertilizes['height'];
        $Fertilize->length = $fertilizes['length'];
        $Fertilize->growth_stat = $fertilizes['growth_stat'];

        if ($this->GrowthRecords->save($Fertilize)) {
            $result['DATA']['ACTION'] = $action_type;
            $result['DATA']['ID'] = $Fertilize->id;
            $result['DATA']['obj'] = $Fertilize;
        } else {
            debug($entity->errors());
            $result = 'fail to update';
        }

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function deleteFertilize() {
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

    public function saveBreeder() {
        $this->autoRender = false;

        $obj = $this->request->getData();
        $objUpdate = $obj['Breeder'];
        $cow_id = $obj['cow_id'];
        // print_r($fertilizes);
        // exit;
        if (empty($objUpdate['id'])) {
            $entity = $this->BreedingRecords->newEntity();
            $entity->createdby = $this->request->session()->read('Auth.User.firstname');
            $entity->cow_id = $cow_id;
            $action_type = 'ADD';
        } else {
            $entity = $this->BreedingRecords->get($objUpdate['id']);
            $entity->updated = date('Y-m-d H:i:s');
            $entity->updatedby = $this->request->session()->read('Auth.User.firstname');
        }

        // print_r($objUpdate);
        $entity->breeding_date = date('Y-m-d', strtotime($objUpdate['breeding_date']));
        $entity->mother_code = $objUpdate['mother_code'];

        if ($this->BreedingRecords->save($entity)) {
            $result['DATA']['ACTION'] = $action_type;
            $result['DATA']['ID'] = $entity->id;
            $result['DATA']['obj'] = $entity;
        } else {
            debug($entity->errors());
            $result = 'fail to update';
        }

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function deleteBreeder() {
        $this->autoRender = false;

        $obj = $this->request->getData();
        $id = $obj['id'];

        $entity = $this->BreedingRecords->get($id);
        $res = $this->BreedingRecords->delete($entity);
        $result['DATA']['DeleteStatus'] = $res;

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function saveGivebirth() {
        $this->autoRender = false;

        $obj = $this->request->getData();
        $objUpdate = $obj['Givebirth'];
        $cow_id = $obj['cow_id'];
        // print_r($fertilizes);
        // exit;
        if (empty($objUpdate['id'])) {
            $entity = $this->GivebirthRecords->newEntity();
            $entity->createdby = $this->request->session()->read('Auth.User.firstname');
            $entity->cow_id = $cow_id;
            $action_type = 'ADD';
        } else {
            $entity = $this->GivebirthRecords->get($objUpdate['id']);
            $entity->updated = date('Y-m-d H:i:s');
            $entity->updatedby = $this->request->session()->read('Auth.User.firstname');
        }

        // print_r($objUpdate);
        $entity->breeding_date = date('Y-m-d', strtotime($objUpdate['breeding_date']));
        $entity->father_code = $objUpdate['father_code'];
        $entity->authorities = $objUpdate['authorities'];
        $entity->breeding_status = $objUpdate['breeding_status'];

        if ($this->GivebirthRecords->save($entity)) {
            $result['DATA']['ACTION'] = $action_type;
            $result['DATA']['ID'] = $entity->id;
            $result['DATA']['obj'] = $entity;
        } else {
            debug($entity->errors());
            $result = 'fail to update';
        }

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function deleteGivebirth() {
        $this->autoRender = false;

        $obj = $this->request->getData();
        $id = $obj['id'];

        $entity = $this->GivebirthRecords->get($id);
        $res = $this->GivebirthRecords->delete($entity);
        $result['DATA']['DeleteStatus'] = $res;

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function saveMovement() {
        $this->autoRender = false;

        $obj = $this->request->getData();
        $objUpdate = $obj['Movement'];
        $cow_id = $obj['cow_id'];
        // print_r($fertilizes);
        // exit;
        if (empty($objUpdate['id'])) {
            $entity = $this->MovementRecords->newEntity();
            $entity->createdby = $this->request->session()->read('Auth.User.firstname');
            $entity->cow_id = $cow_id;
            $action_type = 'ADD';
        } else {
            $entity = $this->MovementRecords->get($objUpdate['id']);
            $entity->updated = date('Y-m-d H:i:s');
            $entity->updatedby = $this->request->session()->read('Auth.User.firstname');
        }

        // print_r($objUpdate);
        $entity->departure = $objUpdate['departure'];
        $entity->destination = $objUpdate['destination'];
        $entity->movement_date = date('Y-m-d', strtotime($objUpdate['movement_date']));
        $entity->description = $objUpdate['description'];

        if ($this->MovementRecords->save($entity)) {
            $result['DATA']['ACTION'] = $action_type;
            $result['DATA']['ID'] = $entity->id;
            $result['DATA']['obj'] = $entity;
        } else {
            debug($entity->errors());
            $result = 'fail to update';
        }

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function deleteMovement() {
        $this->autoRender = false;

        $obj = $this->request->getData();
        $id = $obj['id'];

        $entity = $this->MovementRecords->get($id);
        $res = $this->MovementRecords->delete($entity);
        $result['DATA']['DeleteStatus'] = $res;

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function saveTreatment() {
        $this->autoRender = false;

        $obj = $this->request->getData();
        $objUpdate = $obj['Treatment'];
        $cow_id = $obj['cow_id'];
        // print_r($fertilizes);
        // exit;
        if (empty($objUpdate['id'])) {
            $entity = $this->TreatmentRecords->newEntity();
            $entity->createdby = $this->request->session()->read('Auth.User.firstname');
            $entity->cow_id = $cow_id;
            $action_type = 'ADD';
        } else {
            $entity = $this->TreatmentRecords->get($objUpdate['id']);
            $entity->updated = date('Y-m-d H:i:s');
            $entity->updatedby = $this->request->session()->read('Auth.User.firstname');
        }

        // print_r($objUpdate);
        $entity->treatment_date = date('Y-m-d', strtotime($objUpdate['treatment_date']));
        $entity->disease = $objUpdate['disease'];
        $entity->drug_used = $objUpdate['drug_used'];
        $entity->conservator = $objUpdate['conservator'];

        if ($this->TreatmentRecords->save($entity)) {
            $result['DATA']['ACTION'] = $action_type;
            $result['DATA']['ID'] = $entity->id;
            $result['DATA']['obj'] = $entity;
        } else {
            debug($entity->errors());
            $result = 'fail to update';
        }

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function deleteTreatment() {
        $this->autoRender = false;

        $obj = $this->request->getData();
        $id = $obj['id'];

        $entity = $this->TreatmentRecords->get($id);
        $res = $this->TreatmentRecords->delete($entity);
        $result['DATA']['DeleteStatus'] = $res;

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function autocomplete() {
        $this->autoRender = false;
        $obj = $this->request->getData();
        $keyword = $obj['keyword'];
        $masterType = $obj['masterType'];

        if($masterType == 'FATHERCODE'){
            $data = $this->Cows->find('all')->where(['code LIKE' => '%'.$keyword.'%', 'gender'=>'M']);
        }else if($masterType == 'MOTHERCODE'){
            $data = $this->Cows->find('all')->where(['code LIKE' => '%'.$keyword.'%', 'gender'=>'F']);
        }
        $data = $data->toArray();
        $this->response->body(json_encode($data));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function uploadImage() {
        $this->autoRender = false;

        $obj = $this->request->getData();
        // print_r($obj);
        // exit;
        $file = $obj['uploadObj']['imageObj'];
        $short_desc = $obj['uploadObj']['short_desc'];
        $cow_id = $obj['uploadObj']['cow_id'];

        $WWW_ROOT = WWW_ROOT;
        $WWW_ROOT = str_replace('\\', '/', $WWW_ROOT);
        $img_path = 'upload/img/'; //'upload/img/';//$WWW_ROOT . 
        // echo $WWW_ROOT . 'upload/img/' . $file['name'];
        // exit;
        if (move_uploaded_file($file['tmp_name'], $img_path . $file['name'])) {
            // insert table image
            $images = $this->Images->newEntity();
            $images->name = $file['name'];
            $images->type = 'cows';
            $images->path = $img_path;
            $images->short_desc = $short_desc;
            $images->createdby = $this->request->session()->read('Auth.User.firstname');
            if ($this->Images->save($images)) {
                $img_id = $images->id;
                $result['DATA']['ImgID'] = $img_id;
                // Insert cows image
                $cow_images = $this->CowImages->newEntity();
                $cow_images->cow_id = $cow_id;
                $cow_images->image_id = $img_id;
                $cow_images->createdby = $this->request->session()->read('Auth.User.firstname');
                $this->CowImages->save($cow_images);

                $obj = $this->CowImages->get($cow_images->id, [
                    'contain' => ['Images']]);
                $result['DATA']['obj'] = $obj;
            }
        } else {
            $result['STATUS'] = 'ERROR';
            $result['DATA']['MSG'] = 'Upload failed';
        }

        $this->response->body(json_encode($result));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    public function getCowOwnerRecord($cow_id = null) {
        $this->autoRender = false;
        if (is_null($cow_id)) {
            return null;
        }

        /* select c.code,fc.moveddate,hm.firstname 
          from cows c
          join farm_cows fc on c.id = fc.cow_id
          join  farms f on fc.farm_id = f.id
          join farm_herdsmans fhm on f.id = fhm.farm_id
          join herdsmans hm on fhm.herdsman_id = hm.id
          order by fc.isactive desc,fc.moveddate desc
         * 
         */
        
        $query = $this->Cows->find()
                ->select(['Cows.id','Cows.code'])
                ->contain(['FarmCows'=>[
                    'fields'=>['FarmCows.id','FarmCows.cow_id','FarmCows.farm_id','FarmCows.isactive','FarmCows.moveddate'],
                    'sort'=>['FarmCows.isactive'=>'ASC','FarmCows.moveddate'=>'DESC'],
                    'Farms'=>[
                        'fields'=>['Farms.id','Farms.name'],
                        'FarmHerdsmans'=>[
                            'fields'=>['FarmHerdsmans.id','FarmHerdsmans.herdsman_id','FarmHerdsmans.farm_id']
                            ,'Herdsmans'=>[
                                'fields'=>['Herdsmans.firstname','Herdsmans.lastname']
                            ]]
                        ]
                    ]
                    ])
                ->where(['Cows.id'=>$cow_id]);
        
        $ownerhis = $query->toArray();
        // $json = json_encode($ownerhis);
        //debug($json);
        return $ownerhis;
    }



}
