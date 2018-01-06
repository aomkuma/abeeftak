<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CowBreedsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CowBreedsTable Test Case
 */
class CowBreedsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CowBreedsTable
     */
    public $CowBreeds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cow_breeds',
        'app.cows',
        'app.cow_images',
        'app.images',
        'app.movement_records',
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
        $config = TableRegistry::exists('CowBreeds') ? [] : ['className' => CowBreedsTable::class];
        $this->CowBreeds = TableRegistry::get('CowBreeds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CowBreeds);

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
