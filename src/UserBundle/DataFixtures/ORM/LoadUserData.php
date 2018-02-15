<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use UserBundle\Entity\User;

/**
 * Class LoadUserData
 * @package UserBundle\DataFixtures\ORM
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load user data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setUsername('adminuser');
        $user->setEmail('admin@mail.com');
        $user->setEnabled(true);
        $user->setPassword('$2y$13$.ZOC/S5AkL5sKhMoChoRDuvJKcE2xTn74mHjgkh2wJnaEBt5JVb6C'); // admin
        $user->setRoles(['ROLE_SUPER_ADMIN']);

//        $manager->persist($user);
//        $manager->flush();
    }

    /**
     * Get order
     *
     * Set the order in which fixtures will be loaded
     *
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }
}