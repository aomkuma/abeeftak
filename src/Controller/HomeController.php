<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
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
        
        $this->set('stat',$this->getstat());
        
        
        
    }
    
    private function getstat(){
        //$this->autoRender = false;
        //$CowsModel = TableRegistry::get('Cows');
        $connection = ConnectionManager::get('default');
        
        $data = [
            '1'=>['name'=>'ม.ค.','amt'=>0],
            '2'=>['name'=>'ก.พ.','amt'=>0],
            '3'=>['name'=>'มี.ค.','amt'=>0],
            '4'=>['name'=>'เม.ย.','amt'=>0],
            '5'=>['name'=>'พ.ค.','amt'=>0],
            '6'=>['name'=>'มิ.ย.','amt'=>0],
            '7'=>['name'=>'ก.ค.','amt'=>0],
            '8'=>['name'=>'ส.ค.','amt'=>0],
            '9'=>['name'=>'ก.ย.','amt'=>0],
            '10'=>['name'=>'ต.ค.','amt'=>0],
            '11'=>['name'=>'พ.ย.','amt'=>0],
            '12'=>['name'=>'ธ.ค.','amt'=>0],
        ];
        //debug($data);
        
        $sql = 'select mm,count(*) as amt '
                . 'from (select month(birthday) as mm,year(birthday) as yy,year(now()) as now_yy '
                . 'from cows  where year(birthday)  = year(now())) as main group by mm';
        
        $results = $connection->execute($sql)->fetchAll('assoc');
        //debug($results);
        foreach ($results as $item){
            $data[$item['mm']]['amt'] = 1;
        }
        
        $data = json_encode($data);
        //debug($data);
        
        return $data;
        
    }

}
