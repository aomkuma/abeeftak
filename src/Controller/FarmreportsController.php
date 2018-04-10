<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
/**
 * Farmreports Controller
 *
 *
 * @method \App\Model\Entity\Farmreport[] paginate($object = null, array $settings = [])
 */
class FarmreportsController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

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
        $FarmsModel = TableRegistry::get('Farms');
        $farms = null;
        $issearch = false;
        $isexport = false;
        $jsondata = null;
        $filter_text = '';

        if ($this->request->is(['post'])) {

            $data = $this->request->getData();
            $level = $data['level'];
            $type = $data['type'];
            $subdistrict = $data['subdistrict'];
            $district = $data['district'];
            $bt = $data['search_bt'];
            //debug($data);
            $conditions = [];


            if (!is_null($level) && $level != '') {
                $filter_text = $filter_text . 'ระดับ: ' . $level . '    ';
                array_push($conditions, ['Farms.level' => $level]);
            } else {
                $filter_text = $filter_text . 'ระดับ: ทั้งหมด    ';
            }

            if (!is_null($type) && $type != '') {
                $filter_text = $filter_text . 'ประเภท: ' . $type . '    ';
                array_push($conditions, ['Farms.type' => $type]);
            } else {
                $filter_text = $filter_text . 'ประเภท: ทั้งหมด    ';
            }

            if (!is_null($subdistrict) && $subdistrict != '') {
                $filter_text = $filter_text . 'ตำบล: ' . $subdistrict . '    ';
                array_push($conditions, ['Addresses.subdistrict LIKE ' => '%' . $subdistrict . '%']);
            } else {
                $filter_text = $filter_text . 'ตำบล: ทั้งหมด    ';
            }

            if (!is_null($district) && $district != '') {
                $filter_text = $filter_text . 'อำเภอ: ' . $district . '    ';
                array_push($conditions, ['Addresses.district LIKE ' => '%' . $district . '%']);
            } else {
                $filter_text = $filter_text . 'อำเภอ: ทั้งหมด    ';
            }

            //debug($conditions);

            $q = $FarmsModel->find()
                    ->where($conditions);
            if ($bt == 'SEARCH') {
                $issearch = true;
                $this->paginate = [
                    'contain' => ['Addresses']
                ];
                $farms = $this->paginate($q);
            } else {
                $isexport = true;
                $q = $FarmsModel->find()
                        ->contain(['Addresses'])
                        ->where($conditions);

                $data = $q->toArray();

                for ($i = 0; $i < sizeof($data); $i++) {
                    $address = '';
                    $farm = $data[$i];
                    if (!is_null($farm->address->villagename)) {
                        $address = $address . 'หมู่บ้าน ' . $farm->address->villagename . ' ';
                    }
                    if (!is_null($farm->address->subdistrict)) {
                        $address = $address . 'ตำบล ' . $farm->address->subdistrict . ' ';
                    }
                    if (!is_null($farm->address->district)) {
                        $address = $address . 'อำเภอ ' . $farm->address->district . ' ';
                    }

                    $data[$i]['address']['text'] = $address;
                }

                $jsondata = json_encode($data);
                //$this->log($jsondata,'debug');
            }
        }

        $this->set(compact('jsondata'));
        $this->set('filter_text', $filter_text);
        $this->set(compact('farms'));
        $this->set('_serialize', ['farms']);
        $this->set('farm_levels', $this->FarmLevels);
        $this->set('farm_types', $this->FarmTypes);
        $this->set('issearch', $issearch);
        $this->set('isexport', $isexport);
    }

}
