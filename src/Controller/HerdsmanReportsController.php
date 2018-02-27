<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * HerdsmanReports Controller
 *
 *
 * @method \App\Model\Entity\HerdsmanReport[] paginate($object = null, array $settings = [])
 */
class HerdsmanReportsController extends AppController {

    public $Herdsmans = null;

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
        $grades = ['1' => 'ระดับ 1', '2' => 'ระดับ 2', '3' => 'ระดับ 3', '4' => 'ระดับ 4', '5' => 'ระดับ 5'];
        $titles = ['mr'=>'นาย','miss'=>'นางสาว','mrs'=>'นาง','ms'=>'นาง'];
        $issearch = false;
        $isexport = false;
        $jsondata = null;
        $herdsmans = null;
        $filter_text = '';

        if ($this->request->is(['post'])) {
            $this->Herdsmans = TableRegistry::get('Herdsmans');
            $data = $this->request->getData();

            $grade = $data['grade'];
            $subdistrict = $data['subdistrict'];
            $district = $data['district'];
            $bt = $data['search_bt'];
            //debug($data);
            $conditions = [];
            if (!is_null($grade) && $grade != '') {
                $filter_text = $filter_text.'ระดับสมาชิก: '.$grade.'    ';
                array_push($conditions, ['Herdsmans.grade' => $grade]);
            }else{
                $filter_text = $filter_text.'ตำบล: ทั้งหมด    ';
            }
            
            if (!is_null($subdistrict) && $subdistrict != '') {
                $filter_text = $filter_text.'ตำบล: '.$subdistrict.'    ';
                array_push($conditions, ['Addresses.subdistrict LIKE ' => '%' . $subdistrict . '%']);
            }else{
                $filter_text = $filter_text.'ตำบล: ทั้งหมด    ';
            }
            
            if (!is_null($district) && $district !='') {
                $filter_text = $filter_text.'อำเภอ: '.$district.'    ';
                array_push($conditions, ['Addresses.district LIKE ' => '%' . $district . '%']);
            }else{
                $filter_text = $filter_text.'อำเภอ: ทั้งหมด    ';
            }
            

            $q = $this->Herdsmans->find()
                    ->where($conditions);
            
            if ($bt == 'SEARCH') {
                $issearch = true;
                $this->paginate = [
                    'contain' => ['Addresses']
                ];
                $herdsmans = $this->paginate($q);
            } else {
                $isexport = true;
                $q = $this->Herdsmans->find()
                        ->contain(['Addresses'])
                        ->where($conditions);
                
                $data = $q->toArray();
               
                for ($i=0;$i<sizeof($data);$i++){
                     $address = '';
                    $item = $data[$i];
                    if (!is_null($item->address->villagename)) {
                        $address = $address . 'หมู่บ้าน ' . $item->address->villagename . ' ';
                    }
                    if (!is_null($item->address->subdistrict)) {
                        $address = $address . 'ตำบล ' . $item->address->subdistrict . ' ';
                    }
                    if (!is_null($item->address->district)) {
                        $address = $address . 'อำเภอ ' . $item->address->district . ' ';
                    }
                    
                    $fullname = h($titles[$item->title].$item->firstname.'   '.$item->lastname);
                    $data[$i]['fullname'] = $fullname;
                    $data[$i]['address']['text'] = $address;
                }
                
                $jsondata = json_encode($data);
            }
        }
        
        $this->set('titles',$titles);
        $this->set(compact('jsondata'));
        $this->set('herdsmans',$herdsmans);
        $this->set('grades', $grades);
        $this->set('filter_text', $filter_text);
        $this->set('issearch', $issearch);
        $this->set('isexport', $isexport);
    }

}
