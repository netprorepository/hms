<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicineCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicineCategoriesTable Test Case
 */
class MedicineCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicineCategoriesTable
     */
    public $MedicineCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.medicine_categories',
        'app.medicines',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MedicineCategories') ? [] : ['className' => MedicineCategoriesTable::class];
        $this->MedicineCategories = TableRegistry::getTableLocator()->get('MedicineCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MedicineCategories);

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
