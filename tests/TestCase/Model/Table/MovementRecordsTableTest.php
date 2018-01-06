<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovementRecordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovementRecordsTable Test Case
 */
class MovementRecordsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MovementRecordsTable
     */
    public $MovementRecords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.movement_records',
        'app.cows',
        'app.cow_breeds',
        'app.cow_images',
        'app.images',
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
        $config = TableRegistry::exists('MovementRecords') ? [] : ['className' => MovementRecordsTable::class];
        $this->MovementRecords = TableRegistry::get('MovementRecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MovementRecords);

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
