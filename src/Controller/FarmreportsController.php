<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Farmreports Controller
 *
 *
 * @method \App\Model\Entity\Farmreport[] paginate($object = null, array $settings = [])
 */
class FarmreportsController extends AppController {

    public $FarmLevels = [
        'A-Standard' => 'A-Standard',
        'A-Gold' => 'A-Gold',
        'A-Premium' => 'A-Premium'
    ];
    public $FarmTypes = [
        'clientele' => 'ระดับ 1 - Clientele',
        'breeder' => 'ระดับ 2 - Breeder',
        'conservation' => 'ระดับ 3 - Conservation'
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $FarmsModel = TableRegistry::get('Farms');
        $farms = null;
        $issearch = false;

        if ($this->request->is(['post'])) {

            $data = $this->request->getData();
            $level = $data['level'];
            $type = $data['type'];
            $subdistrict = $data['subdistrict'];
            $district = $data['district'];
            $bt = $data['search_bt'];
            //debug($data);
            $conditions = [];


            if (!is_null($level) && $level != '') {
                array_push($conditions, ['Farms.level' => $level]);
            }
            if (!is_null($type) && $type != '') {
                array_push($conditions, ['Farms.type' => $type]);
            }
            if (!is_null($subdistrict)) {
                array_push($conditions, ['Farms.name LIKE ' => '%' . $subdistrict . '%']);
            }
            if (!is_null($district)) {
                array_push($conditions, ['Farms.name LIKE ' => '%' . $district . '%']);
            }
            //debug($conditions);

            $q = $FarmsModel->find()
                    ->where($conditions);
            if ($bt == 'SEARCH') {
                $issearch = true;
                $this->paginate = [
                    'contain' => ['Addresses']
                ];
                $farms = $this->paginate($q);
            } else {
                $WWW_ROOT = str_replace("\\", "/", WWW_ROOT);
                include $WWW_ROOT . '/PHPJasperLibrary/PHPJasperXML.inc.php';
                include $WWW_ROOT . '/PHPJasperLibrary/tcpdf/tcpdf.php';
                $PHPJasperXML = new \PHPJasperXML;
                $server = "localhost";
                $db = "abeef";
                $user = "root";
                $pass = "";
                $version = "0.8b";
                $pgport = 5432;
                $pchartfolder = "./class/pchart2";

                //display errors should be off in the php.ini file
                ini_set('display_errors', 0);

                //setting the path to the created jrxml file
                $xml = simplexml_load_file($WWW_ROOT . "/jasperlib/report/farm/farmreport.jrxml");

                $PHPJasperXML = new \PHPJasperXML();
                //$PHPJasperXML->debugsql=true;
                $PHPJasperXML->arrayParameter = array("CtrlId" => '1');
                $PHPJasperXML->xml_dismantle($xml);

                $PHPJasperXML->transferDBtoArray($server, $user, $pass, $db);
                $res = $PHPJasperXML->outpage("I");
                exit;
            }
        }

        $this->set(compact('farms'));
        $this->set('_serialize', ['farms']);
        $this->set('farm_levels', $this->FarmLevels);
        $this->set('farm_types', $this->FarmTypes);
        $this->set('issearch', $issearch);
    }

}
