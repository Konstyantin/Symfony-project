<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace CarBundle\DataFixtures\ORM;

use CarBundle\Entity\Body;
use CarBundle\Entity\Configuration;
use CarBundle\Entity\Dynamics;
use CarBundle\Entity\Engine;
use CarBundle\Entity\Fuel;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Class LoadConfigurationData
 * @package CarBundle\DataFixtures\ORM
 */
class LoadConfigurationData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load configuration data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $configuration = new Configuration();

        $engine = $manager->getRepository('CarBundle:Engine')->getItemByName('911');
        $transmission = $manager->getRepository('CarBundle:Transmission')->getItemByName('911 Manual');

        $body = new Body();
        $body->setWeight(1000);
        $body->setHeight(1000);
        $body->setWidth(1000);
        $body->setLength(1000);
        $body->setWheelBase(1000);
        $body->setAerodynamicCoefficient(1);

        $fuel = new Fuel();
        $fuel->setCombined(10);
        $fuel->setEmission(10);
        $fuel->setExtraUrban(20);
        $fuel->setUrban(20);

        $dynamics = new Dynamics();
        $dynamics->setAcceleration(3);
        $dynamics->setSpeed(200);

        $configuration->setPrice(20000);
        $configuration->setCarName('911');
        $configuration->setTransmission($transmission);
        $configuration->setEngine($engine);
        $configuration->setBody($body);
        $configuration->setFuel($fuel);
        $configuration->setDynamics($dynamics);

        $manager->persist($configuration);

        $configuration = new Configuration();

        $engine = $manager->getRepository('CarBundle:Engine')->getItemByName('911');
        $transmission = $manager->getRepository('CarBundle:Transmission')->getItemByName('911 PDK');

        $body = new Body();
        $body->setWeight(1000);
        $body->setHeight(1000);
        $body->setWidth(1000);
        $body->setLength(1000);
        $body->setWheelBase(1000);
        $body->setAerodynamicCoefficient(1);

        $fuel = new Fuel();
        $fuel->setCombined(10);
        $fuel->setEmission(10);
        $fuel->setExtraUrban(20);
        $fuel->setUrban(20);

        $dynamics = new Dynamics();
        $dynamics->setAcceleration(3);
        $dynamics->setSpeed(200);

        $configuration->setPrice(20000);
        $configuration->setCarName('911 Turbo');
        $configuration->setTransmission($transmission);
        $configuration->setEngine($engine);
        $configuration->setBody($body);
        $configuration->setFuel($fuel);
        $configuration->setDynamics($dynamics);

        $manager->persist($configuration);

        $manager->flush();

        $configuration = new Configuration();

        $engine = $manager->getRepository('CarBundle:Engine')->getItemByName('Cayenne');
        $transmission = $manager->getRepository('CarBundle:Transmission')->getItemByName('Cayenne Manual');

        $body = new Body();
        $body->setWeight(1000);
        $body->setHeight(1000);
        $body->setWidth(1000);
        $body->setLength(1000);
        $body->setWheelBase(1000);
        $body->setAerodynamicCoefficient(1);

        $fuel = new Fuel();
        $fuel->setCombined(10);
        $fuel->setEmission(10);
        $fuel->setExtraUrban(20);
        $fuel->setUrban(20);

        $dynamics = new Dynamics();
        $dynamics->setAcceleration(3);
        $dynamics->setSpeed(200);

        $configuration->setPrice(20000);
        $configuration->setCarName('Cayenne');
        $configuration->setTransmission($transmission);
        $configuration->setEngine($engine);
        $configuration->setBody($body);
        $configuration->setFuel($fuel);
        $configuration->setDynamics($dynamics);

        $manager->persist($configuration);

        $manager->flush();
        $configuration = new Configuration();

        $engine = $manager->getRepository('CarBundle:Engine')->getItemByName('Cayenne');
        $transmission = $manager->getRepository('CarBundle:Transmission')->getItemByName('Cayenne PDK');

        $body = new Body();
        $body->setWeight(1000);
        $body->setHeight(1000);
        $body->setWidth(1000);
        $body->setLength(1000);
        $body->setWheelBase(1000);
        $body->setAerodynamicCoefficient(1);

        $fuel = new Fuel();
        $fuel->setCombined(10);
        $fuel->setEmission(10);
        $fuel->setExtraUrban(20);
        $fuel->setUrban(20);

        $dynamics = new Dynamics();
        $dynamics->setAcceleration(3);
        $dynamics->setSpeed(200);

        $configuration->setPrice(20000);
        $configuration->setCarName('Cayenne Turbo');
        $configuration->setTransmission($transmission);
        $configuration->setEngine($engine);
        $configuration->setBody($body);
        $configuration->setFuel($fuel);
        $configuration->setDynamics($dynamics);

        $manager->persist($configuration);

        $configuration = new Configuration();

        $engine = $manager->getRepository('CarBundle:Engine')->getItemByName('Panamera');
        $transmission = $manager->getRepository('CarBundle:Transmission')->getItemByName('Panamera Manual');

        $body = new Body();
        $body->setWeight(1000);
        $body->setHeight(1000);
        $body->setWidth(1000);
        $body->setLength(1000);
        $body->setWheelBase(1000);
        $body->setAerodynamicCoefficient(1);

        $fuel = new Fuel();
        $fuel->setCombined(10);
        $fuel->setEmission(10);
        $fuel->setExtraUrban(20);
        $fuel->setUrban(20);

        $dynamics = new Dynamics();
        $dynamics->setAcceleration(3);
        $dynamics->setSpeed(200);

        $configuration->setPrice(20000);
        $configuration->setCarName('Panamera');
        $configuration->setTransmission($transmission);
        $configuration->setEngine($engine);
        $configuration->setBody($body);
        $configuration->setFuel($fuel);
        $configuration->setDynamics($dynamics);

        $manager->persist($configuration);

        $manager->flush();
        $configuration = new Configuration();

        $engine = $manager->getRepository('CarBundle:Engine')->getItemByName('Panamera');
        $transmission = $manager->getRepository('CarBundle:Transmission')->getItemByName('Panamera PDK');

        $body = new Body();
        $body->setWeight(1000);
        $body->setHeight(1000);
        $body->setWidth(1000);
        $body->setLength(1000);
        $body->setWheelBase(1000);
        $body->setAerodynamicCoefficient(1);

        $fuel = new Fuel();
        $fuel->setCombined(10);
        $fuel->setEmission(10);
        $fuel->setExtraUrban(20);
        $fuel->setUrban(20);

        $dynamics = new Dynamics();
        $dynamics->setAcceleration(3);
        $dynamics->setSpeed(200);

        $configuration->setPrice(20000);
        $configuration->setCarName('Panamera Turbo');
        $configuration->setTransmission($transmission);
        $configuration->setEngine($engine);
        $configuration->setBody($body);
        $configuration->setFuel($fuel);
        $configuration->setDynamics($dynamics);

        $manager->persist($configuration);


        $configuration = new Configuration();

        $engine = $manager->getRepository('CarBundle:Engine')->getItemByName('Macan');
        $transmission = $manager->getRepository('CarBundle:Transmission')->getItemByName('Macan Manual');

        $body = new Body();
        $body->setWeight(1000);
        $body->setHeight(1000);
        $body->setWidth(1000);
        $body->setLength(1000);
        $body->setWheelBase(1000);
        $body->setAerodynamicCoefficient(1);

        $fuel = new Fuel();
        $fuel->setCombined(10);
        $fuel->setEmission(10);
        $fuel->setExtraUrban(20);
        $fuel->setUrban(20);

        $dynamics = new Dynamics();
        $dynamics->setAcceleration(3);
        $dynamics->setSpeed(200);

        $configuration->setPrice(20000);
        $configuration->setCarName('Macan');
        $configuration->setTransmission($transmission);
        $configuration->setEngine($engine);
        $configuration->setBody($body);
        $configuration->setFuel($fuel);
        $configuration->setDynamics($dynamics);

        $manager->persist($configuration);

        $manager->flush();
        $configuration = new Configuration();

        $engine = $manager->getRepository('CarBundle:Engine')->getItemByName('Macan');
        $transmission = $manager->getRepository('CarBundle:Transmission')->getItemByName('Macan PDK');

        $body = new Body();
        $body->setWeight(1000);
        $body->setHeight(1000);
        $body->setWidth(1000);
        $body->setLength(1000);
        $body->setWheelBase(1000);
        $body->setAerodynamicCoefficient(1);

        $fuel = new Fuel();
        $fuel->setCombined(10);
        $fuel->setEmission(10);
        $fuel->setExtraUrban(20);
        $fuel->setUrban(20);

        $dynamics = new Dynamics();
        $dynamics->setAcceleration(3);
        $dynamics->setSpeed(200);

        $configuration->setPrice(20000);
        $configuration->setCarName('Macan Turbo');
        $configuration->setTransmission($transmission);
        $configuration->setEngine($engine);
        $configuration->setBody($body);
        $configuration->setFuel($fuel);
        $configuration->setDynamics($dynamics);

        $manager->persist($configuration);

        $configuration = new Configuration();

        $engine = $manager->getRepository('CarBundle:Engine')->getItemByName('718');
        $transmission = $manager->getRepository('CarBundle:Transmission')->getItemByName('718 Manual');

        $body = new Body();
        $body->setWeight(1000);
        $body->setHeight(1000);
        $body->setWidth(1000);
        $body->setLength(1000);
        $body->setWheelBase(1000);
        $body->setAerodynamicCoefficient(1);

        $fuel = new Fuel();
        $fuel->setCombined(10);
        $fuel->setEmission(10);
        $fuel->setExtraUrban(20);
        $fuel->setUrban(20);

        $dynamics = new Dynamics();
        $dynamics->setAcceleration(3);
        $dynamics->setSpeed(200);

        $configuration->setPrice(20000);
        $configuration->setCarName('718');
        $configuration->setTransmission($transmission);
        $configuration->setEngine($engine);
        $configuration->setBody($body);
        $configuration->setFuel($fuel);
        $configuration->setDynamics($dynamics);

        $manager->persist($configuration);

        $manager->flush();
        $configuration = new Configuration();

        $engine = $manager->getRepository('CarBundle:Engine')->getItemByName('718');
        $transmission = $manager->getRepository('CarBundle:Transmission')->getItemByName('718 PDK');

        $body = new Body();
        $body->setWeight(1000);
        $body->setHeight(1000);
        $body->setWidth(1000);
        $body->setLength(1000);
        $body->setWheelBase(1000);
        $body->setAerodynamicCoefficient(1);

        $fuel = new Fuel();
        $fuel->setCombined(10);
        $fuel->setEmission(10);
        $fuel->setExtraUrban(20);
        $fuel->setUrban(20);

        $dynamics = new Dynamics();
        $dynamics->setAcceleration(3);
        $dynamics->setSpeed(200);

        $configuration->setPrice(20000);
        $configuration->setCarName('718 Turbo');
        $configuration->setTransmission($transmission);
        $configuration->setEngine($engine);
        $configuration->setBody($body);
        $configuration->setFuel($fuel);
        $configuration->setDynamics($dynamics);

        $manager->persist($configuration);



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
        return 100;
    }
}