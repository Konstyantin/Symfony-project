<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 18.10.17
 * Time: 0:21
 */
namespace CarBundle\DataFixtures\ORM;

use CarBundle\Entity\Model;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Class LoadModelData
 * @package CarBundle\DataFixtures\ORM
 */
class LoadModelData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load user data fixtures
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $model = new Model();

        $model->setName('911');

        $manager->persist($model);

        $model = new Model();

        $model->setName('Panamera');

        $manager->persist($model);

        $model = new Model();

        $model->setName('Cayenne');

        $manager->persist($model);

        $model = new Model();

        $model->setName('Macan');

        $manager->persist($model);

        $model = new Model();

        $model->setName('718');

        $manager->persist($model);

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