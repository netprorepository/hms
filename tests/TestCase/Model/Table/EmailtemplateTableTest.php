<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmailtemplateTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmailtemplateTable Test Case
 */
class EmailtemplateTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmailtemplateTable
     */
    public $Emailtemplate;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.emailtemplate',
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
        $config = TableRegistry::getTableLocator()->exists('Emailtemplate') ? [] : ['className' => EmailtemplateTable::class];
        $this->Emailtemplate = TableRegistry::getTableLocator()->get('Emailtemplate', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Emailtemplate);

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
