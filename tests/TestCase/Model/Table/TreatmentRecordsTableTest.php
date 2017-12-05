<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreatmentRecordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreatmentRecordsTable Test Case
 */
class TreatmentRecordsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TreatmentRecordsTable
     */
    public $TreatmentRecords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.treatment_records',
        'app.cows',
        'app.cow_breeds',
        'app.cow_images',
        'app.images',
        'app.movement_records'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TreatmentRecords') ? [] : ['className' => TreatmentRecordsTable::class];
        $this->TreatmentRecords = TableRegistry::get('TreatmentRecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TreatmentRecords);

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
