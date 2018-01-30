<?php
namespace App\Test\TestCase\Controller;

use App\Controller\FarmCowsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\FarmCowsController Test Case
 */
class FarmCowsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.farm_cows',
        'app.farms',
        'app.addresses',
        'app.provinces',
        'app.herdsmans',
        'app.cows',
        'app.cow_breeds',
        'app.cow_images',
        'app.images',
        'app.movement_records',
        'app.treatment_records',
        'app.growth_records',
        'app.breeding_records',
        'app.givebirth_records'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
