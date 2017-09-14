<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaffmembersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaffmembersTable Test Case
 */
class StaffmembersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StaffmembersTable
     */
    public $Staffmembers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.staffmembers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Staffmembers') ? [] : ['className' => 'App\Model\Table\StaffmembersTable'];
        $this->Staffmembers = TableRegistry::get('Staffmembers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Staffmembers);

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
