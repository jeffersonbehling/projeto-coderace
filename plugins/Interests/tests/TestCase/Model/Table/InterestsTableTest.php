<?php
namespace Interests\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Interests\Model\Table\InterestsTable;

/**
 * Interests\Model\Table\InterestsTable Test Case
 */
class InterestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Interests\Model\Table\InterestsTable
     */
    public $Interests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.interests.interests',
        'plugin.interests.users',
        'plugin.interests.events'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Interests') ? [] : ['className' => InterestsTable::class];
        $this->Interests = TableRegistry::get('Interests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Interests);

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
