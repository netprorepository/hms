<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlooddonorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlooddonorsTable Test Case
 */
class BlooddonorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BlooddonorsTable
     */
    public $Blooddonors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.blooddonors',
        'app.nurses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Blooddonors') ? [] : ['className' => BlooddonorsTable::class];
        $this->Blooddonors = TableRegistry::getTableLocator()->get('Blooddonors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Blooddonors);

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
