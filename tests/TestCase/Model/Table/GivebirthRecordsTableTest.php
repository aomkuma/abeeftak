<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GivebirthRecordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GivebirthRecordsTable Test Case
 */
class GivebirthRecordsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GivebirthRecordsTable
     */
    public $GivebirthRecords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.givebirth_records'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('GivebirthRecords') ? [] : ['className' => GivebirthRecordsTable::class];
        $this->GivebirthRecords = TableRegistry::get('GivebirthRecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GivebirthRecords);

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
