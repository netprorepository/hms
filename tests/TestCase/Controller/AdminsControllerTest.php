<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AdminsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AdminsController Test Case
 */
class AdminsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.admins',
        'app.users',
        'app.accountants',
        'app.bloodbank',
        'app.categories',
        'app.departments',
        'app.doctors',
        'app.emailtemplate',
        'app.frontdesks',
        'app.laboratorists'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}