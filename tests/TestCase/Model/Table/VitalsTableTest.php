<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VitalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VitalsTable Test Case
 */
class VitalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VitalsTable
     */
    public $Vitals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vitals',
        'app.patients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Vitals') ? [] : ['className' => VitalsTable::class];
        $this->Vitals = TableRegistry::getTableLocator()->get('Vitals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vitals);

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
