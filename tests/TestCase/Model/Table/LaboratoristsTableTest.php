<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LaboratoristsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LaboratoristsTable Test Case
 */
class LaboratoristsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LaboratoristsTable
     */
    public $Laboratorists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.laboratorists',
        'app.users',
        'app.admins',
        'app.diagnosisreports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Laboratorists') ? [] : ['className' => LaboratoristsTable::class];
        $this->Laboratorists = TableRegistry::getTableLocator()->get('Laboratorists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Laboratorists);

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
