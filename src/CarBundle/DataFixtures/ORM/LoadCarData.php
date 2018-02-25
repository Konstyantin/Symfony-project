<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace CarBundle\DataFixtures\ORM;

use CarBundle\Entity\Car;
use CarBundle\Entity\Model;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Class LoadCarData
 * @package CarBundle\DataFixtures\ORM
 */
class LoadCarData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load user data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $car = new Car();

//        $configuration = $manager->getRepository('CarBundle:Configuration')->getItemByCarName('911')

//        $car->addConfiguration()
        $manager->flush();
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