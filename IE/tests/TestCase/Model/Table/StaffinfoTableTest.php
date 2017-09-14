<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaffinfoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaffinfoTable Test Case
 */
class StaffinfoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StaffinfoTable
     */
    public $Staffinfo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.staffinfo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Staffinfo') ? [] : ['className' => 'App\Model\Table\StaffinfoTable'];
        $this->Staffinfo = TableRegistry::get('Staffinfo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Staffinfo);

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
