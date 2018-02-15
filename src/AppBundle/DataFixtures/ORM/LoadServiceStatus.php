<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\ServiceStatus;

/**
 * Class LoadServiceStatus
 * @package AppBundle\DataFixtures\ORM
 */
class LoadServiceStatus extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load service status data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $serviceStatus = new ServiceStatus();

        $serviceStatus->setStatus('Register');

        $manager->persist($serviceStatus);
        $manager->flush();

        $serviceStatus = new ServiceStatus();

        $serviceStatus->setStatus('In progress');

        $manager->persist($serviceStatus);
        $manager->flush();

        $serviceStatus = new ServiceStatus();

        $serviceStatus->setStatus('Finished');

        $manager->persist($serviceStatus);
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