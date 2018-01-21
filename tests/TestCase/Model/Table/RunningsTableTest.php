<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RunningsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RunningsTable Test Case
 */
class RunningsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RunningsTable
     */
    public $Runnings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.runnings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Runnings') ? [] : ['className' => RunningsTable::class];
        $this->Runnings = TableRegistry::get('Runnings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Runnings);

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
