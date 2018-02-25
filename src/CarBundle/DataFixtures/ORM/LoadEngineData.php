<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace CarBundle\DataFixtures\ORM;

use CarBundle\Entity\Engine;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Class LoadEngineData
 * @package CarBundle\DataFixtures\ORM
 */
class LoadEngineData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load engine data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $engine = new Engine();

        $engine->setName('911');
        $engine->setPrice(2000);
        $engine->setCompression(123);
        $engine->setEngineVolume(300);
        $engine->setNumCylinders(6);
        $engine->setMaxTorque(123);
        $engine->setPower(300);
        $engine->setRHv(6);

        $manager->persist($engine);

        $engine = new Engine();

        $engine->setName('911 Diesel');
        $engine->setPrice(2000);
        $engine->setCompression(123);
        $engine->setEngineVolume(300);
        $engine->setNumCylinders(6);
        $engine->setMaxTorque(123);
        $engine->setPower(300);
        $engine->setRHv(6);

        $manager->persist($engine);

        $engine = new Engine();

        $engine->setName('Cayenne');
        $engine->setPrice(2000);
        $engine->setCompression(123);
        $engine->setEngineVolume(300);
        $engine->setNumCylinders(6);
        $engine->setMaxTorque(123);
        $engine->setPower(300);
        $engine->setRHv(6);

        $manager->persist($engine);

        $engine = new Engine();

        $engine->setName('Cayenne Diesel');
        $engine->setPrice(2000);
        $engine->setCompression(123);
        $engine->setEngineVolume(300);
        $engine->setNumCylinders(6);
        $engine->setMaxTorque(123);
        $engine->setPower(300);
        $engine->setRHv(6);

        $manager->persist($engine);

        $engine = new Engine();

        $engine->setName('Panamera');
        $engine->setPrice(2000);
        $engine->setCompression(123);
        $engine->setEngineVolume(300);
        $engine->setNumCylinders(6);
        $engine->setMaxTorque(123);
        $engine->setPower(300);
        $engine->setRHv(6);

        $manager->persist($engine);

        $engine = new Engine();

        $engine->setName('Panamera Diesel');
        $engine->setPrice(2000);
        $engine->setCompression(123);
        $engine->setEngineVolume(300);
        $engine->setNumCylinders(6);
        $engine->setMaxTorque(123);
        $engine->setPower(300);
        $engine->setRHv(6);

        $manager->persist($engine);

        $engine = new Engine();

        $engine->setName('Macan');
        $engine->setPrice(2000);
        $engine->setCompression(123);
        $engine->setEngineVolume(300);
        $engine->setNumCylinders(6);
        $engine->setMaxTorque(123);
        $engine->setPower(300);
        $engine->setRHv(6);

        $manager->persist($engine);

        $engine = new Engine();

        $engine->setName('Macan Diesel');
        $engine->setPrice(2000);
        $engine->setCompression(123);
        $engine->setEngineVolume(300);
        $engine->setNumCylinders(6);
        $engine->setMaxTorque(123);
        $engine->setPower(300);
        $engine->setRHv(6);

        $manager->persist($engine);

        $manager->flush();

        $engine = new Engine();

        $engine->setName('718');
        $engine->setPrice(2000);
        $engine->setCompression(123);
        $engine->setEngineVolume(300);
        $engine->setNumCylinders(6);
        $engine->setMaxTorque(123);
        $engine->setPower(300);
        $engine->setRHv(6);

        $manager->persist($engine);

        $engine = new Engine();

        $engine->setName('718 Diesel');
        $engine->setPrice(2000);
        $engine->setCompression(123);
        $engine->setEngineVolume(300);
        $engine->setNumCylinders(6);
        $engine->setMaxTorque(123);
        $engine->setPower(300);
        $engine->setRHv(6);

        $manager->persist($engine);

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