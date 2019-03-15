<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NoticeboardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NoticeboardsTable Test Case
 */
class NoticeboardsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NoticeboardsTable
     */
    public $Noticeboards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.noticeboards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Noticeboards') ? [] : ['className' => NoticeboardsTable::class];
        $this->Noticeboards = TableRegistry::getTableLocator()->get('Noticeboards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Noticeboards);

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
