<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisasTable Test Case
 */
class VisasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisasTable
     */
    public $Visas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visas',
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
        $config = TableRegistry::exists('Visas') ? [] : ['className' => 'App\Model\Table\VisasTable'];
        $this->Visas = TableRegistry::get('Visas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Visas);

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
