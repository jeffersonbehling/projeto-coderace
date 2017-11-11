<?php
namespace Photos\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Photos\Model\Table\PhotosTable;

/**
 * Photos\Model\Table\PhotosTable Test Case
 */
class PhotosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Photos\Model\Table\PhotosTable
     */
    public $Photos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.photos.photos',
        'plugin.photos.events',
        'plugin.photos.phinxlog',
        'plugin.photos.photos_phinxlog'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Photos') ? [] : ['className' => PhotosTable::class];
        $this->Photos = TableRegistry::get('Photos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Photos);

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
