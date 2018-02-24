<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GivebirthrecordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GivebirthrecordsTable Test Case
 */
class GivebirthrecordsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GivebirthrecordsTable
     */
    public $Givebirthrecords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.givebirthrecords',
        'app.cows',
        'app.cow_breeds',
        'app.breeding_records',
        'app.cow_images',
        'app.images',
        'app.farm_cows',
        'app.farms',
        'app.addresses',
        'app.provinces',
        'app.herdsmans',
        'app.farm_herdsmans',
        'app.givebirth_records',
        'app.growth_records',
        'app.movement_records',
        'app.treatment_records'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Givebirthrecords') ? [] : ['className' => GivebirthrecordsTable::class];
        $this->Givebirthrecords = TableRegistry::get('Givebirthrecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Givebirthrecords);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
