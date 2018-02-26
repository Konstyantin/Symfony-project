<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\OffersCategory;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Class LoadOffersCategoryData
 * @package AppBundle\DataFixtures\ORM
 */
class LoadOffersCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load offers category data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $offersCategory = new OffersCategory();

        $offersCategory->setName('Winner finance');
        $offersCategory->setDescription(
            'Winner finance Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        );

        $manager->persist($offersCategory);

        $offersCategory = new OffersCategory();

        $offersCategory->setName('Service offers');
        $offersCategory->setDescription(
            'Service offers Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        );

        $manager->persist($offersCategory);

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