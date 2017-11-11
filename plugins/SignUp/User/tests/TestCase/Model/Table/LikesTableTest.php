<?php
namespace SignUp\User\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use SignUp\User\Model\Table\LikesTable;

/**
 * SignUp\User\Model\Table\LikesTable Test Case
 */
class LikesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \SignUp\User\Model\Table\LikesTable
     */
    public $Likes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.sign_up/user.likes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Likes') ? [] : ['className' => LikesTable::class];
        $this->Likes = TableRegistry::get('Likes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Likes);

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
