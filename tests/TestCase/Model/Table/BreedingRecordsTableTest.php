<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BreedingRecordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BreedingRecordsTable Test Case
 */
class BreedingRecordsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BreedingRecordsTable
     */
    public $BreedingRecords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.breeding_records'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BreedingRecords') ? [] : ['className' => BreedingRecordsTable::class];
        $this->BreedingRecords = TableRegistry::get('BreedingRecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BreedingRecords);

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
