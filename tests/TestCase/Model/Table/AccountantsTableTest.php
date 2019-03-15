<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccountantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccountantsTable Test Case
 */
class AccountantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccountantsTable
     */
    public $Accountants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.accountants',
        'app.users',
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
        $config = TableRegistry::getTableLocator()->exists('Accountants') ? [] : ['className' => AccountantsTable::class];
        $this->Accountants = TableRegistry::getTableLocator()->get('Accountants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Accountants);

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
