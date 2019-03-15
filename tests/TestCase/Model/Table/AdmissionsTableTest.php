<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdmissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdmissionsTable Test Case
 */
class AdmissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdmissionsTable
     */
    public $Admissions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.admissions',
        'app.patients',
        'app.wards',
        'app.beds',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Admissions') ? [] : ['className' => AdmissionsTable::class];
        $this->Admissions = TableRegistry::getTableLocator()->get('Admissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Admissions);

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
