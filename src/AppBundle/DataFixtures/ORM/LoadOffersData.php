<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Offers;
use AppBundle\Entity\OffersCategory;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Class LoadOffersData
 * @package AppBundle\DataFixtures\ORM
 */
class LoadOffersData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load offers data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $winnerCategory = $manager->getRepository('AppBundle:OffersCategory')
            ->getItemByName('Winner finance');

        $offerServiceCategory = $manager->getRepository('AppBundle:OffersCategory')
            ->getItemByName('Service offers');


        $offer = new Offers();

        $offer->setTitle('Porsche\'s original brake discs and pads are now on the new acquisition terms');
        $offer->setShortDescription(
            'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
            in a piece of classical Latin literature from 45 BC, making it over 2000 years old.'
        );
        $offer->setDescription(
            'It is a long established fact that a reader will be distracted by the readable content of a page when
             looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
             of letters, as opposed to using \'Content here, content here\', making it look like readable English. 
             Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, 
             and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions
             have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'
        );

        $offer->setOffersCategory($offerServiceCategory);

        $manager->persist($offer);

        $offer = new Offers();

        $offer->setTitle('Special offers for the service of cars older than 3 years');
        $offer->setShortDescription(
            'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
            in a piece of classical Latin literature from 45 BC, making it over 2000 years old.'
        );
        $offer->setDescription(
            'It is a long established fact that a reader will be distracted by the readable content of a page when
             looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
             of letters, as opposed to using \'Content here, content here\', making it look like readable English. 
             Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, 
             and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions
             have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'
        );

        $offer->setOffersCategory($offerServiceCategory);

        $manager->persist($offer);

        $offer = new Offers();

        $offer->setTitle('Spring is here. Time for brilliant appearance on the road');
        $offer->setShortDescription(
            'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
            in a piece of classical Latin literature from 45 BC, making it over 2000 years old.'
        );
        $offer->setDescription(
            'It is a long established fact that a reader will be distracted by the readable content of a page when
             looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
             of letters, as opposed to using \'Content here, content here\', making it look like readable English. 
             Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, 
             and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions
             have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'
        );

        $offer->setOffersCategory($offerServiceCategory);

        $manager->persist($offer);

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