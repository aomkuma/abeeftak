<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GrowthRecordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GrowthRecordsTable Test Case
 */
class GrowthRecordsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GrowthRecordsTable
     */
    public $GrowthRecords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.growth_records'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GrowthRecords') ? [] : ['className' => GrowthRecordsTable::class];
        $this->GrowthRecords = TableRegistry::get('GrowthRecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GrowthRecords);

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
}
