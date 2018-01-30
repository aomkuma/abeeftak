<?php

namespace App\Controller;

use Cake\I18n\Date;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Reports Controller
 *
 *
 * @method \App\Model\Entity\Report[] paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController {

    public $GrowthRecords = null;
    public $Cows = null;
    public $Farms = null;
    public $Addresses = null;
    public $FarmCows = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->GrowthRecords = TableRegistry::get('GrowthRecords');
        $this->Cows = TableRegistry::get('Cows');
        $this->Farms = TableRegistry::get('Farms');
        $this->Addresses = TableRegistry::get('Addresses');
        $this->FarmCows = TableRegistry::get('FarmCows');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        
    }

    public function exportcowfemale1() {
        
    }

    public function exportcowmale2($id = null) {
//        $where = [];
//        
//        array_push($where, ['GrowthRecords.type' => 'F']);
//        $this->Herdsmans->find('all', array('order' => 'Herdsmans.code ASC'))
//                ->where($this->request->session()->read('whereherdsman')
//        $querytwo = $this->GrowthRecords->find('all', [
//            'condition' => ['game_id' => $id],
//            'order' => ['game2_nameEN asc']
//        ]);

        $growthRecord = $this->GrowthRecords->find('all', [
            'conditions' => ['type' => 'F', 'cow_id' => 'e334a24b-81f2-456c-8f44-a8b47aa70ce2']
        ]);

        $growthR = $growthRecord->toArray();
        pr($growthR);
        $jsondata = json_encode($growthR);
        $this->set(compact('jsondata'));
    }

    public function cowqtyreport() {
        $date = new Date();
        $district = ['ท่าสองยาง', 'บ้านตาก', 'พบพระ', 'แม่ระมาด', 'เมืองตาก', 'แม่สอด', 'วังเจ้า', 'สามเงา', 'อุ้มผาง'];






        $connection = ConnectionManager::get('default');




        $query = 'select district, count(*) as amt, type'
                . '  from'
                . '  ('
                . ' SELECT'
                . '  c.code,'
                . '  c.birthday,'
                . ' DATEDIFF(now(), c.birthday) as dayamt,'
                . '  xx.district,'
                . ' ('
                . ' case when DATEDIFF(now(), c.birthday) < 205 then "แรกเกิด"'
                . ' when DATEDIFF(now(), c.birthday) < 365 then "205 วัน"'
                . 'when DATEDIFF(now(), c.birthday) < 548 then "365 วัน"'
                . 'when DATEDIFF(now(), c.birthday) < 730 then "548 วัน"'
                . ' when DATEDIFF(now(), c.birthday) < 1095 then "2 ปี"'
                . ' when DATEDIFF(now(), c.birthday) < 1460 then "3 ปี"'
                . ' when DATEDIFF(now(), c.birthday) < 1825 then "4 ปี" else "5 ปี" end'
                . ' ) as type'
                . ' FROM'
                . ' Farm_Cows fc'
                . ' join cows c on fc.cow_id = c.id'
                . ' join farms f on fc.farm_id = f.id'
                . ' join addresses xx on f.address_id = xx.id'
                . ' ) as main'
                . ' group by district, type'
                . ' order by district asc, amt asc';

        $results = $connection->execute($query)->fetchAll('assoc');
        debug($results);
//        $summaryjs = json_encode($results);
//        $this->set(compact('summaryjs'));
//        }
    }

}
