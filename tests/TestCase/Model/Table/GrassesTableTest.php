<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GrassesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GrassesTable Test Case
 */
class GrassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GrassesTable
     */
    public $Grasses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.grasses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Grasses') ? [] : ['className' => GrassesTable::class];
        $this->Grasses = TableRegistry::get('Grasses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Grasses);

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
