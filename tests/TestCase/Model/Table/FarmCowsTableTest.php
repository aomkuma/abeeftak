<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FarmCowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FarmCowsTable Test Case
 */
class FarmCowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FarmCowsTable
     */
    public $FarmCows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.farm_cows',
        'app.farms',
        'app.addresses',
        'app.provinces',
        'app.herdsmans',
        'app.images',
        'app.farm_herdsmans',
        'app.cows',
        'app.cow_breeds',
        'app.breeding_records',
        'app.cow_images',
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
        $config = TableRegistry::exists('FarmCows') ? [] : ['className' => FarmCowsTable::class];
        $this->FarmCows = TableRegistry::get('FarmCows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FarmCows);

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
