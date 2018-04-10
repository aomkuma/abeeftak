<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
<<<<<<< HEAD
use Cake\ORM\TableRegistry;

=======
>>>>>>> fa172018987ba0880ae057d64b42d2b75a7931f0
/**
 * Approves Controller
 *
 *
 * @method \App\Model\Entity\Approve[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApprovesController extends AppController {

<<<<<<< HEAD
    public $Herdsmans = null;
    public $Cows = null;
    public $Farms = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Cows = TableRegistry::get('Cows');
        $this->Farms = TableRegistry::get('Farms');
        $this->Herdsmans = TableRegistry::get('Herdsmans');
    }

    public function cowlist() {
        $this->viewBuilder()->layout('clean_layout');
        //Find cow to approve
        $query = $this->Cows->find()
                ->where(['Cows.isapproved' => 'N'])
                ->order(['Cows.created' => 'ASC']);
        $cows = $query->toArray();

        $this->set('cows', $cows);
    }

    public function farmlist() {
        $this->viewBuilder()->layout('clean_layout');
        //Find farm to approve
        $query = $this->Farms->find()
                ->where(['Farms.isapproved' => 'N'])
                ->order(['Farms.created' => 'ASC']);
        $farms = $query->toArray();
        $this->set('farms', $farms);
    }

    public function herdsmanlist() {
        $this->viewBuilder()->layout('clean_layout');
        //Find herdsman to approve
        $query = $this->Herdsmans->find()
                ->where(['Herdsmans.isapproved' => 'N'])
                ->order(['Herdsmans.created' => 'ASC']);
        $herdsmans = $query->toArray();
        $this->set('herdsmans', $herdsmans);
    }

    public function cow() {
        
    }

    public function farm() {
        
    }

    public function herdsman() {
        return $this->redirect(['action'=>'herdsmanlist']);
    }

=======
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        if (!$this->Authen->authen()) {
            return $this->redirect(USERPERMISSION);
        }
    }

    public function cowlist() {
        
    }

    public function farmlist() {
        
    }

    public function herdsmanlist() {
        
    }

    public function cow() {
        
    }

    public function farm() {
        
    }

    public function herdsman() {
        
    }

>>>>>>> fa172018987ba0880ae057d64b42d2b75a7931f0
}
