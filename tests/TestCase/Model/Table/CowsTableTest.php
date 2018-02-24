<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CowsTable Test Case
 */
class CowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CowsTable
     */
    public $Cows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Cows') ? [] : ['className' => CowsTable::class];
        $this->Cows = TableRegistry::get('Cows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cows);

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
