<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace CarBundle\DataFixtures\ORM;

use CarBundle\Entity\TransmissionType;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Class LoadTransmissionTYpeData
 * @package CarBundle\DataFixtures\ORM
 */
class LoadTransmissionTYpeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load transmission type data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $transmissionType = new TransmissionType();

        $transmissionType->setTitle('Manual');

        $manager->persist($transmissionType);

        $transmissionType = new TransmissionType();

        $transmissionType->setTitle('PDK');

        $manager->persist($transmissionType);

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