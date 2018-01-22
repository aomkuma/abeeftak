<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Farms Controller
 *
 * @property \App\Model\Table\FarmsTable $Farms
 *
 * @method \App\Model\Entity\Farm[] paginate($object = null, array $settings = [])
 */
class FarmsController extends AppController {

    public $dung_destroy = [
        'ทำบ่อก๊าซชีวภาพ' => 'ทำบ่อก๊าซชีวภาพ',
        'จำหน่าย' => 'จำหน่าย',
        'ทำปุ๋ยใช้เอง' => 'ทำปุ๋ยใช้เอง',
        'ปล่องลงสู่สาธารณะ' => 'ปล่องลงสู่สาธารณะ'
    ];
    public $water_body = [
        'น้ำประปา' => 'น้ำประปา',
        'น้ำบาดาล' => 'น้ำบาดาล',
        'น้ำบ่อ' => 'น้ำบ่อ',
        'ธรรมชาติ' => 'ธรรมชาติ'
    ];
    public $FarmLevels = [
        'A-Standard' => 'A-Standard',
        'A-Gold' => 'A-Gold',
        'A-Premium' => 'A-Premium'
    ];
    public $FarmTypes = [
        'clientele' => 'ระดับ 1 - Clientele',
        'breeder' => 'ระดับ 2 - Breeder',
        'conservation' => 'ระดับ 3 - Conservation'
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        
        $name = $this->request->query('name');
        $level = $this->request->query('level');
        $type = $this->request->query('type');
        $conditions = [];
        
        if(!is_null($name)){
            array_push($conditions, ['Farms.name LIKE '=>'%'.$name.'%']);
        }
        if(!is_null($level) && $level !=''){
            array_push($conditions, ['Farms.level'=>$level]);
        }
        if(!is_null($type) && $type !=''){
            array_push($conditions, ['Farms.type'=>$type]);
        }
        //debug($conditions);
        
        $data = $this->Farms->find()
                ->where($conditions);
        
        $this->paginate = [
            'contain' => ['Addresses']
        ];
        $farms = $this->paginate($data);

        $this->set('farm_levels', $this->FarmLevels);
        $this->set('farm_types', $this->FarmTypes);


        $this->set(compact('farms'));
        $this->set('_serialize', ['farms']);
    }

    /**
     * View method
     *
     * @param string|null $id Farm id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $farm = $this->Farms->get($id, [
            'contain' => ['Addresses']
        ]);

        $this->set('farm', $farm);
        $this->set('_serialize', ['farm']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $farm = $this->Farms->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            //debug($data);
            $farm = $this->Farms->patchEntity($farm, $data);

            $farm->createdby = 'Default';
            $farm->hasstable = 'N';
            if ($data['hasstable'] == 1) {
                $farm->hasstable = 'Y';
            }

            $farm->hasmeadow = 'N';
            if ($data['hasmeadow'] == 1) {
                $farm->hasmeadow = 'Y';
            }
            $province = $this->findProvinceByName($data['address']['province_id']);
            $farm->address->province_id = $province->id;
            if ($this->Farms->save($farm)) {
                $this->Flash->success(__('The farm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->log($farm->errors(), 'debug');
            $this->Flash->error(__('The farm could not be saved. Please, try again.'));
        }

        $this->set('dung_destroy', $this->dung_destroy);
        $this->set('water_body', $this->water_body);
        $this->set('farm_levels', $this->FarmLevels);
        $this->set('farm_types', $this->FarmTypes);
        $this->set('provinces', $this->getListprovinces());
        $this->set('grass', $this->getGrassList());

        $this->set(compact('farm'));
        $this->set('_serialize', ['farm']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Farm id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $farm = $this->Farms->get($id, [
            'contain' => ['Addresses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $farm = $this->Farms->patchEntity($farm, $data);

            $farm->hasstable = 'N';
            if ($data['hasstable'] == 1) {
                $farm->hasstable = 'Y';
            }

            $farm->hasmeadow = 'N';
            if ($data['hasmeadow'] == 1) {
                $farm->hasmeadow = 'Y';
            }
            $province = $this->findProvinceByName($data['address']['province_id']);
            $farm->address->province_id = $province->id;
            $farm->updated = Time::now();
            $farm->updatedby = 'Default';

            if ($this->Farms->save($farm)) {
                $this->Flash->success(__('The farm has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The farm could not be saved. Please, try again.'));
        }
        $province = $this->findProvinceById($farm->address->province_id);
        $farm->address->province_id = $province['province_name'];

        $this->set('dung_destroy', $this->dung_destroy);
        $this->set('water_body', $this->water_body);
        $this->set('farm_levels', $this->FarmLevels);
        $this->set('farm_types', $this->FarmTypes);
        $this->set('provinces', $this->getListprovinces());
        $this->set('grass', $this->getGrassList());

        $this->set(compact('farm'));
        $this->set('_serialize', ['farm']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Farm id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $farm = $this->Farms->get($id);
        if ($this->Farms->delete($farm)) {
            $this->Flash->success(__('The farm has been deleted.'));
        } else {
            $this->Flash->error(__('The farm could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    private function getListprovinces() {
        $provinceModel = TableRegistry::get('Provinces');
        $provinces = $provinceModel->find('list', [
            'keyField' => 'id',
            'valueField' => 'province_name',
            'conditions' => ['Provinces.province_name' => 'ตาก']
        ]);

        //$provinces = $query->toArray();
        return $provinces;
    }

    private function getGrassList() {
        $GrassesModel = TableRegistry::get('Grasses');
        $query = $GrassesModel->find('list');

        return $query;
    }

    private function findProvinceByName($name = null) {
        if (is_null($name)) {
            return null;
        }
        $provinceModel = TableRegistry::get('Provinces');
        $data = $provinceModel->findByProvinceName($name);
        //$this->log($data->first(),'debug');
        //$this->log($name,'debug');
        return $data->first();
    }

    private function findProvinceById($id = null) {
        if (is_null($id)) {
            return null;
        }
        $provinceModel = TableRegistry::get('Provinces');
        $data = $provinceModel->get($id);
        //$this->log($data->first(),'debug');
        //$this->log($name,'debug');
        return $data;
    }

}
