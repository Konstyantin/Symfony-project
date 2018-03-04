<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Principles;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Class LoadPrinciplesData
 * @package AppBundle\DataFixtures\ORM
 */
class LoadPrinciplesData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load principles data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $principles = new Principles();

        $principles->setTitle('First principles');
        $principles->setShortDescription('First short description');
        $principles->setDescription('First principles description');

        $manager->persist($principles);

        $principles = new Principles();

        $principles->setTitle('Second principles');
        $principles->setShortDescription('Second short description');
        $principles->setDescription('Second principles description');

        $manager->persist($principles);

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
        return 110;
    }
}