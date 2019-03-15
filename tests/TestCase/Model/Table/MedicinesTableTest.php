<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicinesTable Test Case
 */
class MedicinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicinesTable
     */
    public $Medicines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.medicines',
        'app.users',
        'app.medicine_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Medicines') ? [] : ['className' => MedicinesTable::class];
        $this->Medicines = TableRegistry::getTableLocator()->get('Medicines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Medicines);

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
