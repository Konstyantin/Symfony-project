<?php

use UserBundle\Entity\UserCar;

/**
 * Class UserCarTest
 */
class UserCarTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * Test create user car item
     */
    public function testCreate()
    {
        $em = $this->getModule('Doctrine2')->em;

        $user = $em->getRepository('UserBundle:User')->getFirstUser();

        $car = $em->getRepository('CarBundle:Car')->getFirstCarItem();

        $model = $em->getRepository('CarBundle:Model')->getFirstModel();

        $transmission = $em->getRepository('CarBundle:Transmission')->getFirstTransmission();

        $engine = $em->getRepository('CarBundle:Engine')->getFirstEngine();

        $createdAt = time();

        $userCar = new UserCar();

        $userCar->setCar($car);
        $userCar->setModel($model);
        $userCar->setEngine($engine);
        $userCar->setTransmission($transmission);
        $userCar->setColor('red');
        $userCar->setCreatedAt($createdAt);

        $em->getRepository('UserBundle:UserCar')->create($userCar, $user);

        $userCarItem = $em->getRepository('UserBundle:UserCar')->getUserCar($car->getId(), $user->getId());

        $this->assertNotNull($userCarItem);

        $this->assertNotEmpty($userCarItem);

        $this->assertEquals($userCarItem->getUser(), $user);

        $this->assertEquals('red', $userCarItem->getColor());
    }

    /**
     * Test edit user car item
     */
    public function testEdit()
    {
        $color = 'yellow';

        $em = $this->getModule('Doctrine2')->em;

        $userCar = $em->getRepository('UserBundle:UserCar')->getFirstItem();

        $userCar->setColor($color);

        $em->getRepository('UserBundle:UserCar')->edit($userCar);

        $userCar = $em->getRepository('UserBundle:UserCar')->getFirstItem();

        $this->assertNotNull($userCar);

        $this->assertEquals($userCar->getColor(), $color);
    }

    /**
     * Test delete user cat item
     */
    public function testDelete()
    {
        $em = $this->getModule('Doctrine2')->em;

        $userCar = $em->getRepository('UserBundle:UserCar')->getFirstItem();

        $em->getRepository('UserBundle:UserCar')->delete($userCar);

        $em->flush();
    }
}