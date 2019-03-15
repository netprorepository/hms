<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BloodbankTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BloodbankTable Test Case
 */
class BloodbankTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BloodbankTable
     */
    public $Bloodbank;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bloodbank',
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
        $config = TableRegistry::getTableLocator()->exists('Bloodbank') ? [] : ['className' => BloodbankTable::class];
        $this->Bloodbank = TableRegistry::getTableLocator()->get('Bloodbank', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bloodbank);

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
