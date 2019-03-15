<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WardsTable Test Case
 */
class WardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WardsTable
     */
    public $Wards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wards',
        'app.admissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Wards') ? [] : ['className' => WardsTable::class];
        $this->Wards = TableRegistry::getTableLocator()->get('Wards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Wards);

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
