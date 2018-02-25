<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace CarBundle\DataFixtures\ORM;

use CarBundle\Entity\Model;
use CarBundle\Entity\Transmission;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Class LoadTransmissionData
 * @package CarBundle\DataFixtures\ORM
 */
class LoadTransmissionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load transmission data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $manualType = $manager->getRepository('CarBundle:TransmissionType')->getItemByTitle('Manual');
        $PDKType = $manager->getRepository('CarBundle:TransmissionType')->getItemByTitle('PDK');

        $transmission = new Transmission();

        $transmission->setName('911 PDK');
        $transmission->setPrice('1000');
        $transmission->setSteps(6);
        $transmission->setType($PDKType);

        $manager->persist($transmission);

        $transmission = new Transmission();

        $transmission->setName('911 Manual');
        $transmission->setPrice('1000');
        $transmission->setSteps(6);
        $transmission->setType($PDKType);

        $manager->persist($transmission);

        $transmission = new Transmission();

        $transmission->setName('Cayenne Manual');
        $transmission->setPrice('1000');
        $transmission->setSteps(7);
        $transmission->setType($manualType);

        $manager->persist($transmission);

        $transmission = new Transmission();

        $transmission->setName('Cayenne PDK');
        $transmission->setPrice('1000');
        $transmission->setSteps(7);
        $transmission->setType($PDKType);

        $manager->persist($transmission);

        $transmission = new Transmission();

        $transmission->setName('Panamera Manual');
        $transmission->setPrice('1000');
        $transmission->setSteps(6);
        $transmission->setType($manualType);

        $manager->persist($transmission);

        $transmission = new Transmission();

        $transmission->setName('Panamera PDK');
        $transmission->setPrice('1000');
        $transmission->setSteps(6);
        $transmission->setType($PDKType);

        $manager->persist($transmission);

        $transmission = new Transmission();

        $transmission->setName('Macan Manual');
        $transmission->setPrice('1000');
        $transmission->setSteps(7);
        $transmission->setType($manualType);

        $manager->persist($transmission);

        $transmission = new Transmission();

        $transmission->setName('Macan PDK');
        $transmission->setPrice('1000');
        $transmission->setSteps(7);
        $transmission->setType($PDKType);

        $manager->persist($transmission);

        $transmission = new Transmission();

        $transmission->setName('718 Manual');
        $transmission->setPrice('1000');
        $transmission->setSteps(6);
        $transmission->setType($manualType);

        $manager->persist($transmission);

        $transmission = new Transmission();

        $transmission->setName('718 PDK');
        $transmission->setPrice('1000');
        $transmission->setSteps(6);
        $transmission->setType($PDKType);

        $manager->persist($transmission);

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