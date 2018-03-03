<?php

/**
 * Class UserTest
 */
class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * Test fid user by username
     */
    public function testFindUserByUsername()
    {
        $em = $this->getModule('Doctrine2')->em;

        $userItem = $em->getRepository('UserBundle:User')->getFirstUser();

        $username = $userItem->getUsername();

        $user = $em->getRepository('UserBundle:User')->findUserByUsername($username);

        $this->assertNotNull($user);

        $this->assertNotEmpty($user);

        $this->assertNotNull($username, $user->getUsername());
    }
}