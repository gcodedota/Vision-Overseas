<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactuspageTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactuspageTable Test Case
 */
class ContactuspageTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactuspageTable
     */
    public $Contactuspage;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contactuspage'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Contactuspage') ? [] : ['className' => 'App\Model\Table\ContactuspageTable'];
        $this->Contactuspage = TableRegistry::get('Contactuspage', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contactuspage);

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
