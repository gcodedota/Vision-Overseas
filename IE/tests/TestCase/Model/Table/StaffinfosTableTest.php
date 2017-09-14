<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaffinfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaffinfosTable Test Case
 */
class StaffinfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StaffinfosTable
     */
    public $Staffinfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.staffinfos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Staffinfos') ? [] : ['className' => 'App\Model\Table\StaffinfosTable'];
        $this->Staffinfos = TableRegistry::get('Staffinfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Staffinfos);

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
