<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace DealerBundle\DataFixtures\ORM;

use DealerBundle\Entity\Dealer;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use ServiceBundle\Entity\ServiceStatus;

/**
 * Class LoadServiceStatus
 * @package AppBundle\DataFixtures\ORM
 */
class LoadDealer extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load dealer data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $dealer = new Dealer();

        $dealer->setCity('Kharkiv');
        $dealer->setName('Kharkiv Center');
        $dealer->setNumber('79/5');
        $dealer->setPhone('386651123123');
        $dealer->setPostCode('61000');
        $dealer->setStreet('Pushkinska');

        $manager->persist($dealer);

        $dealer = new Dealer();

        $dealer->setCity('Lviv');
        $dealer->setName('Lviv Center');
        $dealer->setNumber('8');
        $dealer->setPhone('0322560356');
        $dealer->setPostCode('79000');
        $dealer->setStreet('Shevchenka');

        $manager->persist($dealer);

        $dealer = new Dealer();

        $dealer->setCity('Kiev');
        $dealer->setName('Kiev Aueroport');
        $dealer->setNumber('43');
        $dealer->setPhone('0442019110');
        $dealer->setPostCode('80000');
        $dealer->setStreet('Kyivska');

        $manager->persist($dealer);

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
        return 2;
    }
}