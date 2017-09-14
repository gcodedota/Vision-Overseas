<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmailcontentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmailcontentsTable Test Case
 */
class EmailcontentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmailcontentsTable
     */
    public $Emailcontents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.emailcontents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Emailcontents') ? [] : ['className' => 'App\Model\Table\EmailcontentsTable'];
        $this->Emailcontents = TableRegistry::get('Emailcontents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Emailcontents);

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
