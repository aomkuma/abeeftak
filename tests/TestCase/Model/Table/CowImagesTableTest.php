<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CowImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CowImagesTable Test Case
 */
class CowImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CowImagesTable
     */
    public $CowImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cow_images',
        'app.cows',
        'app.images'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CowImages') ? [] : ['className' => CowImagesTable::class];
        $this->CowImages = TableRegistry::get('CowImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CowImages);

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
