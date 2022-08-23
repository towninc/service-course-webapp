<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LibrariesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LibrariesTable Test Case
 */
class LibrariesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LibrariesTable
     */
    public $Libraries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Libraries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Libraries') ? [] : ['className' => LibrariesTable::class];
        $this->Libraries = TableRegistry::getTableLocator()->get('Libraries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Libraries);

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
