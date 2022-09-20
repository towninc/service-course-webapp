<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChildrensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChildrensTable Test Case
 */
class ChildrensTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChildrensTable
     */
    public $Childrens;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Childrens'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Childrens') ? [] : ['className' => ChildrensTable::class];
        $this->Childrens = TableRegistry::getTableLocator()->get('Childrens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Childrens);

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
