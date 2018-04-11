<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

use Cake\ORM\TableRegistry;


/**
 * Approves Controller
 *
 *
 * @method \App\Model\Entity\Approve[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApprovesController extends AppController {


    public $Herdsmans = null;
    public $Cows = null;
    public $Farms = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
        
        $this->Cows = TableRegistry::get('Cows');
        $this->Farms = TableRegistry::get('Farms');
        $this->Herdsmans = TableRegistry::get('Herdsmans');
    }
    
    public function index(){
        $this->viewBuilder()->layout('clean_layout');
        $transactions = [];
        
        $herdsmanTransactions = $this->herdsmanTransaction();
        $cowTransactions = $this->cowTransaction();
        $farmTransaction = $this->farmTransaction();
        
        $transactions = array_merge($transactions,$herdsmanTransactions);
        $transactions = array_merge($transactions,$cowTransactions);
        $transactions = array_merge($transactions,$farmTransaction);
        
        $this->set(compact('herdsmanTransactions','cowTransactions','farmTransaction','transactions'));
    }
    
    
    private function cowTransaction(){
        $query = $this->Cows->find()
                ->select(['id','request_note','updated'])
                ->where(['Cows.isapproved' => 'N'])
                ->order(['Cows.updated' => 'ASC']);
        $cows = $query->toArray();
        
        
        return $cows;
    }


    private function farmTransaction() {

        $query = $this->Farms->find()
                ->select(['id','request_note','updated'])
                ->where(['Farms.isapproved' => 'N'])
                ->order(['Farms.created' => 'ASC']);
        $farms = $query->toArray();
        return $farms;
    }

    private function herdsmanTransaction() {
        $query = $this->Herdsmans->find()
                ->select(['id','request_note','updated'])
                ->where(['Herdsmans.isapproved' => 'N'])
                ->order(['Herdsmans.created' => 'ASC']);
        $herdsmans = $query->toArray();
        
        return $herdsmans;
    }

    


}
