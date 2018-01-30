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
    public $BreedingRecords = null;
    public $GivebirthRecords = null;
    public $MovementRecords = null;
    public $CowBreeds = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->GrowthRecords = TableRegistry::get('GrowthRecords');
        $this->Cows = TableRegistry::get('Cows');
        $this->Farms = TableRegistry::get('Farms');
        $this->Addresses = TableRegistry::get('Addresses');
        $this->FarmCows = TableRegistry::get('FarmCows');
        $this->BreedingRecords = TableRegistry::get('BreedingRecords');
        $this->GivebirthRecords = TableRegistry::get('GivebirthRecords');
        $this->MovementRecords = TableRegistry::get('MovementRecords');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        
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
    
    public function cowcard($id = null) {
        
        $cow = $this->Cows->get($id, [
            'contain' => []
        ]);
        
        if ($cow->gender == 'M') {
            
            return $this->redirect('/reports/cowmale/'.$cow->id);
            
        } else {
            
            return $this->redirect('/reports/cowfemale/'.$cow->id);
            
        }
        
        
    }
    
    public function cowmale($id = null) {


        $cowmale = $this->Cows->find('all', [
            'conditions' => ['Cows.id' => 'e334a24b-81f2-456c-8f44-a8b47aa70ce2'],
            'contain' => ['CowBreeds']
        ]);

        $growthRecord = $this->GrowthRecords->find('all', [
            'conditions' => ['type' => 'F', 'cow_id' => 'e334a24b-81f2-456c-8f44-a8b47aa70ce2'], array('limit' => 5)
        ]);

        $growthRecordW = $this->GrowthRecords->find('all', [
            'conditions' => ['type' => 'W', 'cow_id' => '7210a34f-bd8e-45d2-a59b-f4f3fda2d08f']
        ]);

        $breedRecord = $this->BreedingRecords->find('all', [
            'conditions' => ['cow_id' => 'e334a24b-81f2-456c-8f44-a8b47aa70ce2']
        ]);

        $breedR = $breedRecord->toArray();
        $jsondataBreed = json_encode($breedR);

        $cowR = $cowmale->toArray();
        $jsondatacow = json_encode($cowR);
        $growthR = $growthRecord->toArray();
        $jsondatagrowth = json_encode($growthR);
        $growthW = $growthRecordW->toArray();
        $jsondatagrowthW = json_encode($growthW);

        $this->set(compact('jsondatacow', 'jsondatagrowth', 'jsondatagrowthW', 'jsondataBreed'));

    }

    public function cowfemale($id = null) {
        
        $cowfemale = $this->Cows->find('all', [
            'conditions' => ['Cows.id' => 'e334a24b-81f2-456c-8f44-a8b47aa70ce2'],
            'contain' => ['CowBreeds']
        ]);

        $growthRecord = $this->GrowthRecords->find('all', [
            'conditions' => ['type' => 'F', 'cow_id' => 'e334a24b-81f2-456c-8f44-a8b47aa70ce2'], array('limit' => 5)
        ]);

        $growthRecordW = $this->GrowthRecords->find('all', [
            'conditions' => ['type' => 'W', 'cow_id' => '7210a34f-bd8e-45d2-a59b-f4f3fda2d08f']
        ]);
        
        $givebirthRecord = $this->GivebirthRecords->find('all', [
            'conditions' => ['cow_id' => 'e334a24b-81f2-456c-8f44-a8b47aa70ce2']
        ]);

        $gbR = $givebirthRecord->toArray();
        $jsondatagbR = json_encode($gbR);

        $cowR = $cowfemale->toArray();
        $jsondatacow = json_encode($cowR);
        $growthR = $growthRecord->toArray();
        $jsondatagrowth = json_encode($growthR);
        $growthW = $growthRecordW->toArray();
        $jsondatagrowthW = json_encode($growthW);

        $this->set(compact('jsondatacow', 'jsondatagrowth', 'jsondatagrowthW', 'jsondatagbR'));
        
    }
    
    public function animalcertificate($id = null) {
        
        $cow = $this->Cows->find('all', [
            'conditions' => ['Cows.id' => 'e334a24b-81f2-456c-8f44-a8b47aa70ce2'],
            'contain' => ['CowBreeds']
        ]);
        
        $cowR = $cow->toArray();
        $jsondatacow = json_encode($cowR);
        
        $cowFather = $this->Cows->find('all', [
            'conditions' => ['Cows.code' => $cowR[0]['father_code']],
            'contain' => ['CowBreeds']
        ]);
        
        $cowMother = $this->Cows->find('all', [
            'conditions' => ['Cows.code' => $cowR[0]['mother_code']],
            'contain' => ['CowBreeds']
        ]);
        
        $cowFath = $cowFather->toArray();
        $jsondataFath = json_encode($cowFath);
        $cowMoth = $cowMother->toArray();
        $jsondataMoth = json_encode($cowMoth);
        
        $this->set(compact('jsondatacow','jsondataFath','jsondataMoth'));
    }

}
