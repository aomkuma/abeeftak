<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Home Controller
 *
 *
 * @method \App\Model\Entity\Home[] paginate($object = null, array $settings = [])
 */
class HomeController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $CowsModel = TableRegistry::get('Cows');
        $query = $CowsModel->find('all');
        $cowamt = $query->count();
        $this->set('cowamt',$cowamt);
        
        $FarmsModel = TableRegistry::get('Farms');
        $query = $FarmsModel->find('all');
        $farmamt = $query->count();
        $this->set('farmamt',$farmamt);
        
        $HerdsmansModel = TableRegistry::get('Herdsmans');
        $query = $HerdsmansModel->find('all');
        $herdsmanamt = $query->count();
        $this->set('herdsmanamt',$herdsmanamt);
        
        
        
    }

}
