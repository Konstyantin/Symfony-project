<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace CarBundle\DataFixtures\ORM;

use CarBundle\Entity\Feature;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Class LoadFeatureData
 * @package CarBundle\DataFixtures\ORM
 */
class LoadFeatureData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load feature data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $car = $manager->getRepository('CarBundle:Car')->getCarItemByName('911');

        $feature = new Feature();
        $feature->setTitle('Dynamics');
        $feature->setShortDescription('New Dynamics');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

        $feature = new Feature();
        $feature->setTitle('Feature');
        $feature->setShortDescription('New Feature');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

        $car = $manager->getRepository('CarBundle:Car')->getCarItemByName('Cayenne');

        $feature = new Feature();
        $feature->setTitle('Dynamics');
        $feature->setShortDescription('New Dynamics');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

        $feature = new Feature();
        $feature->setTitle('Feature');
        $feature->setShortDescription('New Feature');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

        $car = $manager->getRepository('CarBundle:Car')->getCarItemByName('Macan');

        $feature = new Feature();
        $feature->setTitle('Dynamics');
        $feature->setShortDescription('New Dynamics');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

        $feature = new Feature();
        $feature->setTitle('Feature');
        $feature->setShortDescription('New Feature');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

        $car = $manager->getRepository('CarBundle:Car')->getCarItemByName('Panamera');

        $feature = new Feature();
        $feature->setTitle('Dynamics');
        $feature->setShortDescription('New Dynamics');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

        $feature = new Feature();
        $feature->setTitle('Feature');
        $feature->setShortDescription('New Feature');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

        $car = $manager->getRepository('CarBundle:Car')->getCarItemByName('Panamera');

        $feature = new Feature();
        $feature->setTitle('Dynamics');
        $feature->setShortDescription('New Dynamics');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

        $feature = new Feature();
        $feature->setTitle('Feature');
        $feature->setShortDescription('New Feature');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

        $car = $manager->getRepository('CarBundle:Car')->getCarItemByName('718');

        $feature = new Feature();
        $feature->setTitle('Dynamics');
        $feature->setShortDescription('New Dynamics');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

        $feature = new Feature();
        $feature->setTitle('Feature');
        $feature->setShortDescription('New Feature');
        $feature->setFullDescription(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
             incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud'
        );

        $feature->setUpdatedAt(new \DateTime());

        $feature->setCar($car);

        $manager->persist($feature);

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
        return 102;
    }
}