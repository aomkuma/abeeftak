<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\View\Helper\SessionHelper;
use Cake\Network\Session\DatabaseSession;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    public $RoleAccesses = null;
    public $Roles = null;
    public $Actions = null;
    public $Controllers = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->RoleAccesses = TableRegistry::get('RoleAccesses');
        $this->Roles = TableRegistry::get('Roles');
        $this->Actions = TableRegistry::get('Actions');
        $this->Controllers = TableRegistry::get('Controllers');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function ckEmail() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $Email = $this->request->data('mail');
            $query = $this->Users->find('all', [
                'conditions' => ['Users.email=' . $Email]
            ]);

            if ($query->count() == 1) {
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }

            die;
        }
    }

    public function index() {

        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users, array('limit' => PAGE_LIMIT));




        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
        // $this->paginate($members, array('limit' => 10));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $Email = "'" . $this->request->data('email') . "'";
            $query = $this->Users->find('all', [
                'conditions' => ['email=' . $Email]
            ]);

            if ($query->count() == 1) {
                $this->Flash->error(__('E-mail นี้ถูกใช้ไปแล้ว'));
            } else {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('บันทึกข้อมูลสำเร็จ'));

                    return $this->redirect(['action' => 'index']);
                }
            }
        }
        $title = ['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว'];
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
        $this->set('title', $title);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                // $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            // $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
        $title = ['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว'];
        $this->set('title', $title);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        // $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            // $this->Flash->success(__('The user has been deleted.'));
        } else {
            // $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        $this->viewBuilder()->layout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $user = $this->Users->get($user['id']);
                $this->Auth->setUser($user);

                
                $query = $this->RoleAccesses->find('all',[
                    'contain'=>['Actions'=>['Controllers']],
                    'conditions'=>['role_id'=>$user['role_id']]
                ]);
    
                $rolePermissions = $query->toArray();
                //debug($rolePermissions);
                $rolePermissions = $this->makePromissionArr($rolePermissions);
                $this->request->session()->write('rolePermissions',$rolePermissions);
                //debug($rolePermissions);
                  return $this->redirect(['controller' => 'users', 'action' => 'index']);
            }
            //  $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    
    private function makePromissionArr($rolePermissions = null){
        if(is_null($rolePermissions)){
            return null;
        }
        
        $newArr = [];
        $newActionArr = [];
        foreach ($rolePermissions as $value){
            
            $controllerKey = $value['action']['controller']['value'];
            $p = array_search($controllerKey, $newArr);
            //debug($p);
            if($p === false){
                array_push($newArr, $controllerKey);
                $newActionArr[$controllerKey] = [$value['action']['value']];
                //array_push($newActionArr[$controllerKey],$value['action']['value'] );
            }else{
               array_push($newActionArr[$controllerKey],$value['action']['value'] );
            }
            //debug($controllerKey);
            //$newArr = ['controllername'=>$controllerKey,'actions'=>[]];
            //$actionArr = ['action'=>$value['action']['value']];
            //array_push($newArr['actions'], $actionArr);
        }
        //debug($newActionArr);
        
        $rolePermissions = [
            'controller'=>$newArr,
            'actions'=>$newActionArr
        ];
        return $rolePermissions;
    }

    public function logout() {
        $this->request->session()->destroy();
      //  return $this->redirect($this->Auth->logout());
    }

    public function searchuser() {

        $names = $this->request->data('txtSearch');

        if ($names != '') {

            $names = '%' . $this->request->data('txtSearch') . '%';


            $query = $this->Users->find('all', [
                'conditions' => ['firstname LIKE ' => $names],
                'contain' => ['Roles']
            ]);
            $this->request->session()->write('names', $names);
            $users = $this->paginate($query, array('limit' => 1));

            $this->set(compact('users'));
            $this->set('_serialize', ['users']);

            $sess = $this->request->session()->read('names');
        } else {
            $sess = $this->request->session()->read('names');

            $query = $this->Users->find('all', [
                'conditions' => ['firstname LIKE ' => $sess],
                'contain' => ['Roles']
            ]);

            $users = $this->paginate($query, array('limit' => PAGE_LIMIT));
            $this->set(compact('users'));
            $this->set('_serialize', ['users']);
        }
    }
public function printPDFXml(){    

        $this->autoRender = false;

        $WWW_ROOT = str_replace("\\", "/", WWW_ROOT);
        include $WWW_ROOT . '/PHPJasperLibrary/PHPJasperXML.inc.php';
        include $WWW_ROOT . '/PHPJasperLibrary/tcpdf/tcpdf.php';
        $PHPJasperXML = new \PHPJasperXML;
        $server="localhost";
        $db="abeef";
        $user="root";
        $pass="";
        $version="0.8b";
        $pgport=5432;
        $pchartfolder="./class/pchart2";
         
        //display errors should be off in the php.ini file
        ini_set('display_errors', 0);
         
        //setting the path to the created jrxml file
        $xml =  simplexml_load_file($WWW_ROOT . "/jasperlib/report/UserReport.jrxml");
         
        $PHPJasperXML = new \PHPJasperXML();
        //$PHPJasperXML->debugsql=true;
        $PHPJasperXML->arrayParameter=array("CtrlId"=>'1');
        $PHPJasperXML->xml_dismantle($xml);
         
        $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
        $res = $PHPJasperXML->outpage("I");
        exit;
    }
}
