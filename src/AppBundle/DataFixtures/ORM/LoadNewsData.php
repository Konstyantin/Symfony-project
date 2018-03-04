<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\News;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Class LoadNewsData
 * @package AppBundle\DataFixtures\ORM
 */
class LoadNewsData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load news data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $news = new News();

        $news->setTitle('First news');
        $news->setShortDescription('First short description');
        $news->setDescription('First new description');

        $manager->persist($news);

        $news = new News();

        $news->setTitle('Second news');
        $news->setShortDescription('Second short description');
        $news->setDescription('Second new description');

        $manager->persist($news);
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