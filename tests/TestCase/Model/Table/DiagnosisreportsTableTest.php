<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiagnosisreportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiagnosisreportsTable Test Case
 */
class DiagnosisreportsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DiagnosisreportsTable
     */
    public $Diagnosisreports;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.diagnosisreports',
        'app.prescriptions',
        'app.users',
        'app.diagnosistypes',
        'app.consultations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Diagnosisreports') ? [] : ['className' => DiagnosisreportsTable::class];
        $this->Diagnosisreports = TableRegistry::getTableLocator()->get('Diagnosisreports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Diagnosisreports);

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
