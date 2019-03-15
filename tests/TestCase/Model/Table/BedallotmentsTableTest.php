<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BedallotmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BedallotmentsTable Test Case
 */
class BedallotmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BedallotmentsTable
     */
    public $Bedallotments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bedallotments',
        'app.beds',
        'app.patients',
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
        $config = TableRegistry::getTableLocator()->exists('Bedallotments') ? [] : ['className' => BedallotmentsTable::class];
        $this->Bedallotments = TableRegistry::getTableLocator()->get('Bedallotments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bedallotments);

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
