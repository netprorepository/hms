<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiagnosistypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiagnosistypesTable Test Case
 */
class DiagnosistypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DiagnosistypesTable
     */
    public $Diagnosistypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.diagnosistypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Diagnosistypes') ? [] : ['className' => DiagnosistypesTable::class];
        $this->Diagnosistypes = TableRegistry::getTableLocator()->get('Diagnosistypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Diagnosistypes);

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
