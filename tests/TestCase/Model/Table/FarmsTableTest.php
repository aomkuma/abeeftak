<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FarmsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FarmsTable Test Case
 */
class FarmsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FarmsTable
     */
    public $Farms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.farms',
        'app.addresses',
        'app.provinces',
        'app.herdsmans',
        'app.farm_cows',
        'app.cows',
        'app.cow_breeds',
        'app.cow_images',
        'app.images',
        'app.movement_records',
        'app.treatment_records',
        'app.growth_records',
        'app.breeding_records',
        'app.givebirth_records',
        'app.farm_herdsmans',
        'app.herdsmen'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Farms') ? [] : ['className' => FarmsTable::class];
        $this->Farms = TableRegistry::get('Farms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Farms);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
