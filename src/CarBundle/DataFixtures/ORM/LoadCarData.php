<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace CarBundle\DataFixtures\ORM;

use CarBundle\Entity\Car;
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

        $configuration = $manager->getRepository('CarBundle:Configuration')->getItemByCarName('911');
        $configurationTurbo = $manager->getRepository('CarBundle:Configuration')->getItemByCarName('911 Turbo');

        $model =$manager->getRepository('CarBundle:Model')->getModelByName('911');
        $car->setPrice(10000);
        $car->setName('911');
        $car->addConfiguration($configuration);
        $car->addConfiguration($configurationTurbo);
        $car->setAvailable(true);
        $car->setModel($model);

        $manager->persist($car);

        $car = new Car();

        $configuration = $manager->getRepository('CarBundle:Configuration')->getItemByCarName('Cayenne');
        $configurationTurbo = $manager->getRepository('CarBundle:Configuration')->getItemByCarName('Cayenne Turbo');

        $model =$manager->getRepository('CarBundle:Model')->getModelByName('Cayenne');
        $car->setPrice(10000);
        $car->setName('Cayenne');
        $car->addConfiguration($configuration);
        $car->addConfiguration($configurationTurbo);
        $car->setAvailable(true);
        $car->setModel($model);

        $manager->persist($car);

        $car = new Car();

        $configuration = $manager->getRepository('CarBundle:Configuration')->getItemByCarName('Panamera');
        $configurationTurbo = $manager->getRepository('CarBundle:Configuration')->getItemByCarName('Panamera Turbo');

        $model =$manager->getRepository('CarBundle:Model')->getModelByName('Panamera');
        $car->setPrice(10000);
        $car->setName('Panamera');
        $car->addConfiguration($configuration);
        $car->addConfiguration($configurationTurbo);
        $car->setAvailable(true);
        $car->setModel($model);

        $manager->persist($car);

        $car = new Car();

        $configuration = $manager->getRepository('CarBundle:Configuration')->getItemByCarName('Macan');
        $configurationTurbo = $manager->getRepository('CarBundle:Configuration')->getItemByCarName('Macan Turbo');

        $model =$manager->getRepository('CarBundle:Model')->getModelByName('Macan');
        $car->setPrice(10000);
        $car->setName('Macan');
        $car->addConfiguration($configuration);
        $car->addConfiguration($configurationTurbo);
        $car->setAvailable(true);
        $car->setModel($model);

        $manager->persist($car);

        $car = new Car();

        $configuration = $manager->getRepository('CarBundle:Configuration')->getItemByCarName('718');
        $configurationTurbo = $manager->getRepository('CarBundle:Configuration')->getItemByCarName('718 Turbo');

        $model =$manager->getRepository('CarBundle:Model')->getModelByName('718');
        $car->setPrice(10000);
        $car->setName('718');
        $car->addConfiguration($configuration);
        $car->addConfiguration($configurationTurbo);
        $car->setAvailable(true);
        $car->setModel($model);

        $manager->persist($car);

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
        return 101;
    }
}