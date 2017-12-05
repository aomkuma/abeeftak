<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HerdsmansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HerdsmansTable Test Case
 */
class HerdsmansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HerdsmansTable
     */
    public $Herdsmans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.herdsmans',
        'app.addresses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Herdsmans') ? [] : ['className' => HerdsmansTable::class];
        $this->Herdsmans = TableRegistry::get('Herdsmans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Herdsmans);

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
