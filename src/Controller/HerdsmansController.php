<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Log\Log;
use Cake\Routing\Router;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Herdsmans Controller
 *
 * @property \App\Model\Table\HerdsmansTable $Herdsmans
 *
 * @method \App\Model\Entity\Herdsman[] paginate($object = null, array $settings = [])
 */
class HerdsmansController extends AppController {

    public $Addresses = null;
    public $Images = null;
    public $Provinces = null;
    public $Runnings = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Addresses = TableRegistry::get('Addresses');
        $this->Images = TableRegistry::get('Images');
        $this->Provinces = TableRegistry::get('Provinces');
        $this->Runnings = TableRegistry::get('Runnings');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Addresses']
        ];
        $whereherdsman = [];
        $this->request->session()->write('whereherdsman', $whereherdsman);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->session()->delete('whereherdsman');
            $searchfrom = $this->request->getData('searchfrom');
            $search = $this->request->getData('search');

            $sprsearch = explode(" ", $search);
            pr($sprsearch);
            $whereherdsman = [];

            if (sizeof($sprsearch) == 1) {

                if ($searchfrom == 1) {
                    $search1 = '%' . $this->request->getData('search') . '%';
                    array_push($whereherdsman, ['Herdsmans.code LIKE' => $search1]);
                } else if ($searchfrom == 2) {

                    $name = '%' . $sprsearch[0] . '%';
                    //     $lastname = "'%'" . $arrSearch[1] . "'%'";
                    array_push($whereherdsman, (array('OR' => array('Herdsmans.firstname LIKE' => $name, 'Herdsmans.lastname LIKE' => $name))));
                    pr($whereherdsman);
                } else if ($searchfrom == 3) {
                    $search1 = '%' . $this->request->getData('search') . '%';
                    array_push($whereherdsman, ['Herdsmans.idcard LIKE' => $search1]);
                } else {

                    $fromdate = $this->request->getData('fromdate');
                    $todate = $this->request->getData('todate');

                    array_push($whereherdsman, ['Herdsmans.registerdate >=' => $fromdate, 'Herdsmans.registerdate <=' => $todate]);
                }
            } else {

                if ($searchfrom == 1) {

                    $search1 = '%' . $this->request->getData('search') . '%';
                    array_push($whereherdsman, ['Herdsmans.code LIKE' => $search1]);
                } else if ($searchfrom == 2) {

                    $name = '%' . $sprsearch[0] . '%';
                    $lastname = '%' . $sprsearch[1] . '%';
                    array_push($whereherdsman, ['Herdsmans.firstname LIKE' => $name, 'Herdsmans.lastname LIKE' => $lastname]);
                } else if ($searchfrom == 3) {

                    $search1 = '%' . $this->request->getData('search') . '%';
                    array_push($whereherdsman, ['Herdsmans.idcard LIKE' => $search1]);
                } else {

                    $fromdate = $this->request->getData('fromdate');
                    $todate = $this->request->getData('todate');

                    array_push($whereherdsman, ['Herdsmans.registerdate >=' => $fromdate, 'Herdsmans.registerdate <=' => $todate]);
                }
            }

            $this->request->session()->write('whereherdsman', $whereherdsman);
        }


        $herdsmans = $this->paginate($this->Herdsmans->find('all', array('order' => 'Herdsmans.code ASC'))
                        ->where($this->request->session()->read('whereherdsman')), array('limit' => PAGE_LIMIT));
        if (sizeof($herdsmans->toArray() == 0)) {
            $this->request->session()->delete('whereherdsman');
        }
        $searchfrom = ['1' => 'รหัสผู้เลี้ยงโค', '2' => 'ชื่อ-นามสกุล', '3' => 'รหัสประจำตัวประชาชน', '4' => 'วันที่ขึ้นทะเบียน'];
        $this->set(compact('herdsmans', 'searchfrom'));
        $this->set('_serialize', ['herdsmans']);
    }

    /**
     * View method
     *
     * @param string|null $id Herdsman id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $herdsman = $this->Herdsmans->get($id, [
            'contain' => ['Addresses']
        ]);

        $this->set('herdsman', $herdsman, 'address');
        $this->set('_serialize', ['herdsman', 'address']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $herdsman = $this->Herdsmans->newEntity();
        pr('test 1 ' . $herdsman->image_id);
        if ($this->request->is('post')) {
            pr('test 2 ' . $herdsman->image_id);
            $getname = $this->request->session()->read('Auth.User');
            $address = $this->Addresses->newEntity();
//            $this->Herdsmans->find('all', array('order' => 'Herdsmans.code ASC'))
            $pro_name = $this->request->getData('province_id');
            $provinceQuery = $this->Provinces->find('all', ['conditions' => ['Provinces.province_name' => $pro_name]]);
            $province = $provinceQuery->toArray();
//            pr($provinceQuery);
            if ($province == null) {
                $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'add']);
            }

            $address->houseno = $this->request->getData('houseno');
            $address->villageno = $this->request->getData('villageno');
            $address->villagename = $this->request->getData('villagename');
            $address->subdistrict = $this->request->getData('subdistrict');
            $address->district = $this->request->getData('district');
            $address->province_id = $province[0]['id'];
            $address->postalcode = $this->request->getData('postalcode');
            $address->address_line = $this->request->getData('address_line');
            $address->createdby = $getname['firstname'] . ' ' . $getname['lastname'];
            $address->updatedby = $getname['firstname'] . ' ' . $getname['lastname'];

            if ($this->Addresses->save($address)) {

                $filenameimg = $this->request->data['image']['name'];

                $uploadpath = 'upload/img/herdsman/';

                $image = $this->Images->newEntity();
                $image->name = $filenameimg;
                $image->path = $uploadpath;
                $image->type = 'herdsman';
                $image->createdby = $getname['firstname'] . ' ' . $getname['lastname'];

                $uploadfileimg = $uploadpath . $filenameimg;

                if ($this->Images->save($image)) {
                    move_uploaded_file($this->request->data['image']['tmp_name'], $uploadfileimg);

//                    $herdsman = $this->Herdsmans->patchEntity($herdsman, $this->request->getData());

                    $herdsman->code = $this->genCode(); //'00001';
                    $herdsman->aac_code = $this->request->getData('aac_code');
                    $herdsman->amc_code = $this->request->getData('amc_code');
                    $herdsman->grade = $this->request->getData('grade');
                    $herdsman->title = $this->request->getData('title');
                    $herdsman->firstname = $this->request->getData('firstname');
                    $herdsman->lastname = $this->request->getData('lastname');
                    $herdsman->idcard = $this->request->getData('idcard');
                    $herdsman->birthday = $this->request->getData('birthday');
                    $herdsman->account_number1 = $this->request->getData('account_number1');
                    $herdsman->account_number2 = $this->request->getData('account_number2');
                    $herdsman->registerdate = $this->request->getData('registerdate');
                    $herdsman->mobile = $this->request->getData('mobile');
                    if ($this->request->getData('email') == '') {
                        $herdsman->email = null;
                    } else {
                        $herdsman->email = $this->request->getData('email');
                    }
                    $herdsman->address_id = $address->id;

                    $herdsman->createdby = $getname['firstname'] . ' ' . $getname['lastname'];
                    $herdsman->updatedby = $getname['firstname'] . ' ' . $getname['lastname'];
                    $herdsman->isactive = 'Y';
                    $herdsman->image_id = $image->id;
                    if ($this->Herdsmans->save($herdsman)) {

                        $this->Flash->success(__('The herdsman has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Addresses->delete($address);
                    $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
                }
                $this->Addresses->delete($address);
                $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
            }
            $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
        }
        $addresses = $this->Herdsmans->Addresses->find('list', ['limit' => 200]);
        $grade = ['1' => 'General', '2' => 'Standard', '3' => 'Gold', '4' => 'Premium', '5' => 'Platinum'];
        $title = ['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว'];
        $this->set(compact('herdsman', 'addresses', 'grade', 'title'));
        $this->set('_serialize', ['herdsman']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Herdsman id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $herdsman = $this->Herdsmans->get($id, [
            'contain' => []
        ]);
        $herdsman->registerdate = $herdsman->registerdate->toDateString();

        $herdsman->birthday = $herdsman->birthday->toDateString();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $getname = $this->request->session()->read('Auth.User');
            ///// address /////

            $province = $this->findProvinceByName($this->request->getData('province_id'));

            if ($province->id == null) {
                $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'edit']);
            }

            $address = $this->Addresses->get($herdsman->address_id);

            $address->houseno = $this->request->getData('houseno');
            $address->villageno = $this->request->getData('villageno');
            $address->villagename = $this->request->getData('villagename');
            $address->subdistrict = $this->request->getData('subdistrict');
            $address->district = $this->request->getData('district');
            $address->province_id = $province->id;
            $address->postalcode = $this->request->getData('postalcode');
            $address->address_line = $this->request->getData('address_line');
            $address->updatedby = $getname['firstname'] . ' ' . $getname['lastname'];

            $this->Addresses->save($address);

            ///// image /////
            $filenameimg = $this->request->data['image']['name'];
            if ($filenameimg != '') {
                $image = $this->Images->get($herdsman->image_id);

                $delfile = $image->path . $image->name;
                $file = new File(WWW_ROOT . $delfile, false, 0777);
                $file->delete();

                $uploadpath = 'upload/img/herdsman/';

                $image->name = $filenameimg;
                $image->path = $uploadpath;

                $uploadfileimg = $uploadpath . $filenameimg;
                $this->Images->save($image);

                move_uploaded_file($this->request->data['image']['tmp_name'], $uploadfileimg);
            }

            ///// herdsmans /////
//            $herdsman = $this->Herdsmans->patchEntity($herdsman, $this->request->getData());
            $herdsman->aac_code = $this->request->getData('aac_code');
            $herdsman->amc_code = $this->request->getData('amc_code');
            $herdsman->grade = $this->request->getData('grade');
            $herdsman->title = $this->request->getData('title');
            $herdsman->firstname = $this->request->getData('firstname');
            $herdsman->lastname = $this->request->getData('lastname');
            $herdsman->idcard = $this->request->getData('idcard');
            $herdsman->birthday = $this->request->getData('birthday');
            $herdsman->account_number1 = $this->request->getData('account_number1');
            $herdsman->account_number2 = $this->request->getData('account_number2');
            $herdsman->registerdate = $this->request->getData('registerdate');
            $herdsman->mobile = $this->request->getData('mobile');
            $herdsman->updatedby = $getname['firstname'] . ' ' . $getname['lastname'];

            if ($this->request->getData('email') == '') {
                $herdsman->email = null;
            } else {
                $herdsman->email = $this->request->getData('email');
            }
            if ($this->Herdsmans->save($herdsman)) {
             
                $this->Flash->success(__('The herdsman has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
        }

        $address = $this->Addresses->get($herdsman->address_id);

        $province = $this->findProvinceById($address->province_id);
        $address->province_id = $province['province_name'];

        $image = $this->Images->get($herdsman->image_id);
        $imgpath = $image->path . $image->name;
        $grade = ['1' => 'General', '2' => 'Standard', '3' => 'Gold', '4' => 'Premium', '5' => 'Platinum'];
        $title = ['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว'];
        $this->set(compact('herdsman', 'address', 'grade', 'title', 'imgpath'));
        $this->set('_serialize', ['herdsman']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Herdsman id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        //$this->request->allowMethod(['post', 'delete','put']);
        $herdsman = $this->Herdsmans->get($id);
        $address = $this->Addresses->get($herdsman->address_id);
        $image = $this->Images->get($herdsman->image_id);

        $delfile = $image->path . $image->name;
        $file = new File(WWW_ROOT . $delfile, false, 0777);
        $file->delete();

        $this->Addresses->delete($address);
        $this->Images->delete($image);
        if ($this->Herdsmans->delete($herdsman)) {
            return $this->redirect(['action' => 'index']);
            $this->Flash->success(__('The herdsman has been deleted.'));
        } else {
            $this->Flash->error(__('The herdsman could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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

    private function genCode() {
        $this->autoRender = false;
        $running = $this->Runnings->find('all')->where(['running_type' => 'HERDSMAN']);

        $runningtoArr = $running->toArray();
        if (sizeof($runningtoArr) == 0) {
            $running = $this->Runnings->newEntity();
            $running->id = 'herdsman';
            $running->running_code = 'TAK';
            $running->running_no = 1;
            $code = '00001';
            $running->runnubg_date = '2018-01-01';
            $running->running_type = 'HERDSMAN';
            $this->Runnings->save($running);
        } else {
            $running_no = $runningtoArr[0]['running_no'] + 1;
            $sprrunnngnum = strlen($running_no);

            $zeroplussize = 5 - $sprrunnngnum;

            $zeroplus = '';
            for ($i = 0; $i < $zeroplussize; $i++) {
                $zeroplus = $zeroplus . '0';
            }

            $code = $zeroplus . $running_no;
            $runningtoArr[0]['running_code'] = 'TAK';
            $runningtoArr[0]['running_no'] = $running_no;
            $this->Runnings->save($runningtoArr[0]);
        }



        return $code;
    }

}
