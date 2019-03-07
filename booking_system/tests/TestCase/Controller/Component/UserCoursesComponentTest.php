<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\UserCoursesComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\UserCoursesComponent Test Case
 */
class UserCoursesComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\UserCoursesComponent
     */
    public $UserCourses;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->UserCourses = new UserCoursesComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserCourses);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
