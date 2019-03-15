<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NursesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NursesTable Test Case
 */
class NursesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NursesTable
     */
    public $Nurses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nurses',
        'app.users',
        'app.bedallotments',
        'app.beds',
        'app.blooddonors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Nurses') ? [] : ['className' => NursesTable::class];
        $this->Nurses = TableRegistry::getTableLocator()->get('Nurses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nurses);

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
