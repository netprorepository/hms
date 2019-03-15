<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreatmentplansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreatmentplansTable Test Case
 */
class TreatmentplansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TreatmentplansTable
     */
    public $Treatmentplans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.treatmentplans',
        'app.consultations',
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
        $config = TableRegistry::getTableLocator()->exists('Treatmentplans') ? [] : ['className' => TreatmentplansTable::class];
        $this->Treatmentplans = TableRegistry::getTableLocator()->get('Treatmentplans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Treatmentplans);

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
