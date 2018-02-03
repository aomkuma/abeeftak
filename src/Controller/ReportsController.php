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
      



        $connection = ConnectionManager::get('default');



//
//        $query = 'select district, count(*) as amt, type'
//                . '  from'
//                . '  ('
//                . ' SELECT'
//                . '  c.code,'
//                . '  c.birthday,'
//                . ' DATEDIFF(now(), c.birthday) as dayamt,'
//                . '  xx.district,'
//                . ' ('
//                . ' case when DATEDIFF(now(), c.birthday) < 205 then "แรกเกิด"'
//                . ' when DATEDIFF(now(), c.birthday) < 365 then "205 วัน"'
//                . 'when DATEDIFF(now(), c.birthday) < 548 then "365 วัน"'
//                . 'when DATEDIFF(now(), c.birthday) < 730 then "548 วัน"'
//                . ' when DATEDIFF(now(), c.birthday) < 1095 then "2 ปี"'
//                . ' when DATEDIFF(now(), c.birthday) < 1460 then "3 ปี"'
//                . ' when DATEDIFF(now(), c.birthday) < 1825 then "4 ปี" else "5 ปี" end'
//                . ' ) as type'
//                . ' FROM'
//                . ' Farm_Cows fc'
//                . ' join cows c on fc.cow_id = c.id'
//                . ' join farms f on fc.farm_id = f.id'
//                . ' join addresses xx on f.address_id = xx.id'
//                . ' ) as main'
//                . ' group by district, type'
//                . ' order by district asc, amt asc';
//        
        $query1 = "select m.district "
                . "as amphur, IF(s.amt IS null, '0', s.amt) as cnt "
                . "FROM "
                . "(select district  "
                . ",count(*) as amt "
                . "from "
                . ' Farm_Cows fc'
                . ' join cows c on fc.cow_id = c.id'
                . ' join farms f on fc.farm_id = f.id'
                . ' join addresses xx on f.address_id = xx.id '
                . 'WHERE DATEDIFF(now(), c.birthday) < 205 '
                . ' group by district, type) AS s '
                . 'right join '
                . 'addresses m '
                . 'on m.district = s.district'
        ;

        $results1 = $connection->execute($query1)->fetchAll('assoc');
        $query2 = "select m.district "
                . "as amphur, IF(s.amt IS null, '0', s.amt) as cnt "
                . "FROM "
                . "(select district  "
                . ",count(*) as amt "
                . "from "
                . ' Farm_Cows fc'
                . ' join cows c on fc.cow_id = c.id'
                . ' join farms f on fc.farm_id = f.id'
                . ' join addresses xx on f.address_id = xx.id '
                . 'WHERE DATEDIFF(now(), c.birthday) > 205 and DATEDIFF(now(), c.birthday) < 365'
                . ' group by district, type) AS s '
                . 'right join '
                . 'addresses m '
                . 'on m.district = s.district'
        ;

        $results2 = $connection->execute($query2)->fetchAll('assoc');
        $query3 = "select m.district "
                . "as amphur, IF(s.amt IS null, '0', s.amt) as cnt "
                . "FROM "
                . "(select district  "
                . ",count(*) as amt "
                . "from "
                . ' Farm_Cows fc'
                . ' join cows c on fc.cow_id = c.id'
                . ' join farms f on fc.farm_id = f.id'
                . ' join addresses xx on f.address_id = xx.id '
                . 'WHERE DATEDIFF(now(), c.birthday) > 365 and DATEDIFF(now(), c.birthday) < 548'
                . ' group by district, type) AS s '
                . 'right join '
                . 'addresses m '
                . 'on m.district = s.district'
        ;

        $results3 = $connection->execute($query3)->fetchAll('assoc');
        $query4 = "select m.district "
                . "as amphur, IF(s.amt IS null, '0', s.amt) as cnt "
                . "FROM "
                . "(select district  "
                . ",count(*) as amt "
                . "from "
                . ' Farm_Cows fc'
                . ' join cows c on fc.cow_id = c.id'
                . ' join farms f on fc.farm_id = f.id'
                . ' join addresses xx on f.address_id = xx.id '
                . 'WHERE DATEDIFF(now(), c.birthday) > 548 and DATEDIFF(now(), c.birthday) < 730'
                . ' group by district, type) AS s '
                . 'right join '
                . 'addresses m '
                . 'on m.district = s.district'
        ;

        $results4 = $connection->execute($query4)->fetchAll('assoc');
          $query5 = "select m.district "
                . "as amphur, IF(s.amt IS null, '0', s.amt) as cnt "
                . "FROM "
                . "(select district  "
                . ",count(*) as amt "
                . "from "
                . ' Farm_Cows fc'
                . ' join cows c on fc.cow_id = c.id'
                . ' join farms f on fc.farm_id = f.id'
                . ' join addresses xx on f.address_id = xx.id '
                . 'WHERE DATEDIFF(now(), c.birthday) > 730 and DATEDIFF(now(), c.birthday) < 1095'
                . ' group by district, type) AS s '
                . 'right join '
                . 'addresses m '
                . 'on m.district = s.district'
        ;

        $results5 = $connection->execute($query5)->fetchAll('assoc');
        $query6 = "select m.district "
                . "as amphur, IF(s.amt IS null, '0', s.amt) as cnt "
                . "FROM "
                . "(select district  "
                . ",count(*) as amt "
                . "from "
                . ' Farm_Cows fc'
                . ' join cows c on fc.cow_id = c.id'
                . ' join farms f on fc.farm_id = f.id'
                . ' join addresses xx on f.address_id = xx.id '
                . 'WHERE DATEDIFF(now(), c.birthday) > 1095 and DATEDIFF(now(), c.birthday) < 1460'
                . ' group by district, type) AS s '
                . 'right join '
                . 'addresses m '
                . 'on m.district = s.district'
        ;

        $results6 = $connection->execute($query6)->fetchAll('assoc');
        $query7 = "select m.district "
                . "as amphur, IF(s.amt IS null, '0', s.amt) as cnt "
                . "FROM "
                . "(select district  "
                . ",count(*) as amt "
                . "from "
                . ' Farm_Cows fc'
                . ' join cows c on fc.cow_id = c.id'
                . ' join farms f on fc.farm_id = f.id'
                . ' join addresses xx on f.address_id = xx.id '
                . 'WHERE DATEDIFF(now(), c.birthday) > 1460 and DATEDIFF(now(), c.birthday) < 1825'
                . ' group by district, type) AS s '
                . 'right join '
                . 'addresses m '
                . 'on m.district = s.district'
        ;

        $results7 = $connection->execute($query7)->fetchAll('assoc');
        $query8 = "select m.district "
                . "as amphur, IF(s.amt IS null, '0', s.amt) as cnt "
                . "FROM "
                . "(select district  "
                . ",count(*) as amt "
                . "from "
                . ' Farm_Cows fc'
                . ' join cows c on fc.cow_id = c.id'
                . ' join farms f on fc.farm_id = f.id'
                . ' join addresses xx on f.address_id = xx.id '
                . 'WHERE DATEDIFF(now(), c.birthday) > 1825 '
                . ' group by district, type) AS s '
                . 'right join '
                . 'addresses m '
                . 'on m.district = s.district'
        ;

        $results8 = $connection->execute($query8)->fetchAll('assoc');
//        debug($results1);
//        debug($results2);
//        debug($results3);

//        
        $summaryjs1 = json_encode($results1);
        $summaryjs2 = json_encode($results2);
        $summaryjs3 = json_encode($results3);
        $summaryjs4 = json_encode($results4);
        $summaryjs5 = json_encode($results5);
        $summaryjs6 = json_encode($results6);
        $summaryjs7 = json_encode($results7);
        $summaryjs8 = json_encode($results8);
        $this->set(compact('summaryjs1','summaryjs2','summaryjs3','summaryjs4','summaryjs5','summaryjs6','summaryjs7','summaryjs8'));
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
            'conditions' => ['Cows.id' => $id],
            'contain' => ['CowBreeds']
        ]);

        $cowR = $cowmale->toArray();
        $jsondatacow = json_encode($cowR);
        
        $growthRecord = $this->GrowthRecords->find('all', [
            'conditions' => ['type' => 'F', 'cow_id' => $cowR->id], array('limit' => 5)
        ]);

        $growthRecordW = $this->GrowthRecords->find('all', [
            'conditions' => ['type' => 'W', 'cow_id' => $cowR->id]
        ]);

        $breedRecord = $this->BreedingRecords->find('all', [
            'conditions' => ['cow_id' => $cowR->id]
        ]);
        
        $cowFather = $this->Cows->find('all', [
            'conditions' => ['Cows.code' => $cowR[0]['father_code']],
            'contain' => ['CowBreeds']
        ]);
        
        $cowMother = $this->Cows->find('all', [
            'conditions' => ['Cows.code' => $cowR[0]['mother_code']],
            'contain' => ['CowBreeds']
        ]);

        $breedR = $breedRecord->toArray();
        $jsondataBreed = json_encode($breedR);
        
        $growthR = $growthRecord->toArray();
        $jsondatagrowth = json_encode($growthR);
        $growthW = $growthRecordW->toArray();
        $jsondatagrowthW = json_encode($growthW);
        $cowFath = $cowFather->toArray();
        $jsondataFath = json_encode($cowFath);
        $cowMoth = $cowMother->toArray();
        $jsondataMoth = json_encode($cowMoth);

        $this->set(compact('jsondatacow', 'jsondatagrowth', 'jsondatagrowthW', 'jsondataBreed','jsondataFath','jsondataMoth'));

    }

    public function cowfemale($id = null) {
        
        $cowfemale = $this->Cows->find('all', [
            'conditions' => ['Cows.id' => $id],
            'contain' => ['CowBreeds']
        ]);
        
        $cowR = $cowfemale->toArray();
        $jsondatacow = json_encode($cowR);

        $growthRecord = $this->GrowthRecords->find('all', [
            'conditions' => ['type' => 'F', 'cow_id' => $cowR->id], array('limit' => 5)
        ]);

        $growthRecordW = $this->GrowthRecords->find('all', [
            'conditions' => ['type' => 'W', 'cow_id' => $cowR->id]
        ]);
        
        $givebirthRecord = $this->GivebirthRecords->find('all', [
            'conditions' => ['cow_id' => $cowR->id]
        ]);
        
        $cowFather = $this->Cows->find('all', [
            'conditions' => ['Cows.code' => $cowR[0]['father_code']],
            'contain' => ['CowBreeds']
        ]);
        
        $cowMother = $this->Cows->find('all', [
            'conditions' => ['Cows.code' => $cowR[0]['mother_code']],
            'contain' => ['CowBreeds']
        ]);

        $gbR = $givebirthRecord->toArray();
        $jsondatagbR = json_encode($gbR);
        
        $growthR = $growthRecord->toArray();
        $jsondatagrowth = json_encode($growthR);
        $growthW = $growthRecordW->toArray();
        $jsondatagrowthW = json_encode($growthW);
        $cowFath = $cowFather->toArray();
        $jsondataFath = json_encode($cowFath);
        $cowMoth = $cowMother->toArray();
        $jsondataMoth = json_encode($cowMoth);

        $this->set(compact('jsondatacow', 'jsondatagrowth', 'jsondatagrowthW', 'jsondatagbR','jsondataFath','jsondataMoth'));
        
    }
    
    public function animalcertificate($id = null) {
        
        $cow = $this->Cows->find('all', [
            'conditions' => ['Cows.id' => $id],
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
        
        $movementRecord = $this->MovementRecords->find('all', [
            'conditions' => ['cow_id' => 'e334a24b-81f2-456c-8f44-a8b47aa70ce2']
        ]);

        $moveR = $movementRecord->toArray();
        $jsondatamoveR = json_encode($moveR);
        $this->set(compact('$jsondatamoveR'));
        
        $cowFath = $cowFather->toArray();
        $jsondataFath = json_encode($cowFath);
        $cowMoth = $cowMother->toArray();
        $jsondataMoth = json_encode($cowMoth);
        
        $this->set(compact('jsondatacow','jsondataFath','jsondataMoth','jsondatamoveR'));
    }

}
