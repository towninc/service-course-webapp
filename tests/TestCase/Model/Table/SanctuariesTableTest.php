<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SanctuariesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SanctuariesTable Test Case
 */
class SanctuariesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SanctuariesTable
     */
    public $Sanctuaries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Sanctuaries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Sanctuaries') ? [] : ['className' => SanctuariesTable::class];
        $this->Sanctuaries = TableRegistry::getTableLocator()->get('Sanctuaries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sanctuaries);

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
