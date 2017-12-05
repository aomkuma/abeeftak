<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoleAccessesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoleAccessesTable Test Case
 */
class RoleAccessesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RoleAccessesTable
     */
    public $RoleAccesses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.role_accesses',
        'app.roles',
        'app.users',
        'app.actions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RoleAccesses') ? [] : ['className' => RoleAccessesTable::class];
        $this->RoleAccesses = TableRegistry::get('RoleAccesses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RoleAccesses);

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
