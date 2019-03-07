<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersCoursesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersCoursesTable Test Case
 */
class UsersCoursesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersCoursesTable
     */
    public $UsersCourses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsersCourses',
        'app.Users',
        'app.Courses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsersCourses') ? [] : ['className' => UsersCoursesTable::class];
        $this->UsersCourses = TableRegistry::getTableLocator()->get('UsersCourses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersCourses);

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
