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
        //F
        $query = $CowsModel->find('all')
                ->where(['Cows.gender'=>'F']);
        $cow_f_amt = $query->count();
        
        //F
        $query = $CowsModel->find('all')
                ->where(['Cows.gender'=>'M']);
        $cow_m_amt = $query->count();
        
        
        
        $this->set('cowfamt',$cow_f_amt);
        $this->set('cowmamt',$cow_m_amt);
        $this->set('cowamt',$cow_f_amt+$cow_m_amt);
        
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
