<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Reports Controller
 *
 *
 * @method \App\Model\Entity\Report[] paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{
     public $GrowthRecords = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->GrowthRecords = TableRegistry::get('GrowthRecords');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        
    }

    public function exportcowfemale1()
    {
        
    }
    
    public function exportcowmale2($id = null)
    {
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
            'conditions' => ['type' => 'F' , 'cow_id' => 'e334a24b-81f2-456c-8f44-a8b47aa70ce2']
        ]);
        
        $growthR = $growthRecord->toArray();
        pr($growthR);
        $jsondata = json_encode($growthR);
        $this->set(compact('jsondata'));
    }
}
