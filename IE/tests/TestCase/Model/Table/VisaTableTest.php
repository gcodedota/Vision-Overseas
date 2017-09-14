<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisaTable Test Case
 */
class VisaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisaTable
     */
    public $Visa;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visa'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Visa') ? [] : ['className' => 'App\Model\Table\VisaTable'];
        $this->Visa = TableRegistry::get('Visa', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Visa);

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
