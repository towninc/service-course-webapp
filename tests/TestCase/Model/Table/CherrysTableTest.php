<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CherrysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CherrysTable Test Case
 */
class CherrysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CherrysTable
     */
    public $Cherrys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cherrys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cherrys') ? [] : ['className' => CherrysTable::class];
        $this->Cherrys = TableRegistry::getTableLocator()->get('Cherrys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cherrys);

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
