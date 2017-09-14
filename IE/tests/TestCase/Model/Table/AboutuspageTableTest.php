<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AboutuspageTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AboutuspageTable Test Case
 */
class AboutuspageTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AboutuspageTable
     */
    public $Aboutuspage;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.aboutuspage'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Aboutuspage') ? [] : ['className' => 'App\Model\Table\AboutuspageTable'];
        $this->Aboutuspage = TableRegistry::get('Aboutuspage', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Aboutuspage);

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
