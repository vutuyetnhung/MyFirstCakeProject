<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserGroupTblTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserGroupTblTable Test Case
 */
class UserGroupTblTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserGroupTblTable
     */
    public $UserGroupTbl;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_group_tbl',
        'app.user_groups',
        'app.users',
        'app.groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserGroupTbl') ? [] : ['className' => UserGroupTblTable::class];
        $this->UserGroupTbl = TableRegistry::get('UserGroupTbl', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserGroupTbl);

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
