<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrontdesksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrontdesksTable Test Case
 */
class FrontdesksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FrontdesksTable
     */
    public $Frontdesks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.frontdesks',
        'app.users',
        'app.departments',
        'app.admins'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Frontdesks') ? [] : ['className' => FrontdesksTable::class];
        $this->Frontdesks = TableRegistry::getTableLocator()->get('Frontdesks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Frontdesks);

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
