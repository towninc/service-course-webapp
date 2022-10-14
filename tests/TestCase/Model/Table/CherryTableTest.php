<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CherryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CherryTable Test Case
 */
class CherryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CherryTable
     */
    public $Cherry;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cherry'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cherry') ? [] : ['className' => CherryTable::class];
        $this->Cherry = TableRegistry::getTableLocator()->get('Cherry', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cherry);

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
