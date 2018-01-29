<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FarmHerdsmansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FarmHerdsmansTable Test Case
 */
class FarmHerdsmansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FarmHerdsmansTable
     */
    public $FarmHerdsmans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.farm_herdsmans',
        'app.farms',
        'app.addresses',
        'app.provinces',
        'app.herdsmans',
        'app.images',
        'app.farm_cows',
        'app.cows',
        'app.cow_breeds',
        'app.cow_images',
        'app.movement_records',
        'app.treatment_records',
        'app.growth_records',
        'app.breeding_records',
        'app.givebirth_records',
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
        $config = TableRegistry::exists('FarmHerdsmans') ? [] : ['className' => FarmHerdsmansTable::class];
        $this->FarmHerdsmans = TableRegistry::get('FarmHerdsmans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FarmHerdsmans);

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
