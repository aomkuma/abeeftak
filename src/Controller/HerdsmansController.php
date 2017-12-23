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

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Addresses = TableRegistry::get('Addresses');
        $this->Images = TableRegistry::get('Images');
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
              
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->session()->delete('whereherdsman');
            pr('2222222222');
            $searchfrom = $this->request->getData('searchfrom');
            $search = $this->request->getData('search');
            
            $whereherdsman = [];
            
            if($searchfrom == 1){
                
                array_push($whereherdsman, ['Herdsmans.code' => $search]);
                
            } else if($searchfrom == 2){
                
                $arrSearch = explode ( " ", $search );
                
                array_push($whereherdsman, ['Herdsmans.firstname' => $arrSearch[0], 'Herdsmans.lastname' =>  $arrSearch[1]]);
                
            } else if($searchfrom == 3){
                
                array_push($whereherdsman, ['Herdsmans.idcard' => $search]);
                
            } else {
                
                $fromdate = $this->request->getData('fromdate');
                $todate = $this->request->getData('todate');
                
                array_push($whereherdsman, ['Herdsmans.registerdate >=' => $fromdate, 'Herdsmans.registerdate <=' => $todate]);
                
            }
            
            $this->request->session()->write('whereherdsman', $whereherdsman);
                      
            
        }
        
        $herdsmans = $this->paginate($this->Herdsmans->find('all', array('order' => 'Herdsmans.code ASC'))
                ->where($this->request->session()->read('whereherdsman')), array('limit' => 3));
        
//        $chkside = sizeof($herdsmans->toArray());
//        
//        if($chkside == 0){
//            $herdsmans = $this->paginate($this->Herdsmans, array('limit' => 5));
//        }
            
        
        
        pr('1111111111111');   
        
        $searchfrom = ['1' => 'รหัสผู้เลี้ยงโค' ,'2' => 'ชื่อ-นามสกุล', '3' => 'รหัสประจำตัวประชาชน', '4' => 'วันที่ขึ้นทะเบียน'];
        $this->set(compact('herdsmans','searchfrom'));
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
            'contain' => ['Addresses','Images']
            
        ]);

        $image = $this->Images->get($herdsman->image_id);
        $imgpath = $image->path;
        
        $this->set('herdsman', $herdsman, 'address', $imgpath);
        $this->set('_serialize', ['herdsman','address']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $herdsman = $this->Herdsmans->newEntity();
        if ($this->request->is('post')) {

            $address = $this->Addresses->newEntity();

            $address->houseno = $this->request->getData('houseno');
            $address->villageno = $this->request->getData('villageno');
            $address->villagename = $this->request->getData('villagename');
            $address->subdistrict = $this->request->getData('subdistrict');
            $address->district = $this->request->getData('district');
            $address->province_id = '785bf32b-2ad6-4ede-98ac-4eac989b1430';
            $address->postalcode = $this->request->getData('postalcode');
            $address->address_line = 'yy';
            $address->description = 'uu';
            $address->createdby = 'ii';
            $address->updatedby = 'oo';

            if ($this->Addresses->save($address)) {

                $filenameimg = $this->request->data['image']['name'];
                $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);

                $uploadpath = 'upload/img/';

                $image = $this->Images->newEntity();
                $image->name = $this->request->getData('firstname') . '-' . $this->request->getData('lastname') . '.' . $extimg;
                $image->path = $uploadpath . $this->request->getData('firstname') . '-' . $this->request->getData('lastname') . '.' . $extimg;

                $uploadfileimg = $uploadpath . $this->request->getData('firstname') . '-' . $this->request->getData('lastname') . '.' . $extimg;

                if ($this->Images->save($image)) {

                    move_uploaded_file($this->request->data['image']['tmp_name'], $uploadfileimg);

                    $herdsman = $this->Herdsmans->patchEntity($herdsman, $this->request->getData());
                    $herdsman->code = '55556';
                    $herdsman->address_id = $address->id;
                    $herdsman->image_id = $image->id;
                    $herdsman->description = 'uio';
                    $herdsman->createdby = 'ii';
                    $herdsman->updatedby = 'uu';
                    $herdsman->isactive = 'Y';
                    pr($herdsman);

                    if ($this->Herdsmans->save($herdsman)) {
                        $this->Flash->success(__('The herdsman has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Images->delete($image);
                    $this->Addresses->delete($address);
                    $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
                }
                $this->Addresses->delete($address);
                $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
            }
            $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
        }
        $addresses = $this->Herdsmans->Addresses->find('list', ['limit' => 200]);
        $grade = ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'];
        $title = ['mr' => 'นาย', 'mrs' => 'นาง', 'ms' => 'นางสาว', 'other' => 'อื่นๆ'];
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
        if ($this->request->is(['patch', 'post', 'put'])) {

            ///// address /////

            $address = $this->Addresses->get($herdsman->address_id);

            $address->houseno = $this->request->getData('houseno');
            $address->villageno = $this->request->getData('villageno');
            $address->villagename = $this->request->getData('villagename');
            $address->subdistrict = $this->request->getData('subdistrict');
            $address->district = $this->request->getData('district');
            $address->province_id = '785bf32b-2ad6-4ede-98ac-4eac989b1430';
            $address->postalcode = $this->request->getData('postalcode');
            $address->address_line = 'yy';
            $address->description = 'uu';
            $address->createdby = 'ii';
            $address->updatedby = 'oo';

            $this->Addresses->save($address);

            ///// image /////

            $image = $this->Images->get($herdsman->image_id);

            $filenameimg = $this->request->data['image']['name'];
            if ($filenameimg != '') {

                $delfile = $image->path;
                $file = new File(WWW_ROOT . $delfile, false, 0777);
                $file->delete();

                $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);

                $uploadpath = 'upload/img/';

                $image->name = $this->request->getData('firstname') . '-' . $this->request->getData('lastname') . '.' . $extimg;
                $image->path = $uploadpath . $this->request->getData('firstname') . '-' . $this->request->getData('lastname') . '.' . $extimg;

                $uploadfileimg = $uploadpath . $this->request->getData('firstname') . '-' . $this->request->getData('lastname') . '.' . $extimg;

                $this->Images->save($image);
                move_uploaded_file($this->request->data['image']['tmp_name'], $uploadfileimg);
            }

            ///// herdsmans /////

            $herdsman = $this->Herdsmans->patchEntity($herdsman, $this->request->getData());
            $herdsman->updatedby = 'uu';
            pr($herdsman);
            if ($this->Herdsmans->save($herdsman)) {
                $this->Flash->success(__('The herdsman has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The herdsman could not be saved. Please, try again.'));
        }
        $address = $this->Addresses->get($herdsman->address_id);
        $image = $this->Images->get($herdsman->image_id);
        $imgpath = $image->path;
        $grade = ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'];
        $title = ['mr' => 'นาย', 'mrs' => 'นาง', 'ms' => 'นางสาว', 'other' => 'อื่นๆ'];
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
        $this->request->allowMethod(['post', 'delete']);
        $herdsman = $this->Herdsmans->get($id);
        $address = $this->Addresses->get($herdsman->address_id);
        $image = $this->Images->get($herdsman->image_id);

        $delfile = $image->path;
        $file = new File(WWW_ROOT . $delfile, false, 0777);
        $file->delete();

        $this->Addresses->delete($address);
        $this->Images->delete($image);
        if ($this->Herdsmans->delete($herdsman)) {
            $this->Flash->success(__('The herdsman has been deleted.'));
        } else {
            $this->Flash->error(__('The herdsman could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
