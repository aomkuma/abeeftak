<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Approves Controller
 *
 *
 * @method \App\Model\Entity\Approve[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApprovesController extends AppController {

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

}
