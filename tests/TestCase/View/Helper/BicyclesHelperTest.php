<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\BicyclesHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\BicyclesHelper Test Case
 */
class BicyclesHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\BicyclesHelper
     */
    public $Bicycles;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Bicycles = new BicyclesHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bicycles);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
