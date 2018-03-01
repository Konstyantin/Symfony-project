<?php

/**
 * Class CarTest
 */
class CarTest extends \Codeception\Test\Unit
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
     * Test get car item by name
     */
    public function testGetCarItemByName()
    {
        $em = $this->getModule('Doctrine2')->em;

        $car = $em->getRepository('CarBundle:Car')->getCarItemByName('911');

        $this->assertNotNull($car);

        $this->assertNotEmpty($car);

        $this->assertEquals('911', $car->getName());

        $this->assertEquals('911', $car->getModel());
    }

    /**
     * Test get cars by user id
     */
    public function testGetCarsByUserId()
    {
        $em = $this->getModule('Doctrine2')->em;

        $car = $em->getRepository('CarBundle:Car')->getCarsByUserId();

        $this->assertNotEmpty($car);

        $this->assertNotNull($car);
    }

    /**
     * Test get available car list
     */
    public function testGetAvailableCarList()
    {
        $em = $this->getModule('Doctrine2')->em;

        $car = $em->getRepository('CarBundle:Car')->getAvailableCarList();

        $this->assertNotEmpty($car);

        $this->assertGreaterThan(4, count($car));
    }

    /**
     * Test get first car item
     */
    public function testGetFirstCarItem()
    {
        $em = $this->getModule('Doctrine2')->em;

        $car = $em->getRepository('CarBundle:Car')->getFirstCarItem();

        $this->assertNotNull($car);
    }

    /**
     * Test get cars by model
     */
    public function testGetCarsByModel()
    {
        $modelName = '911';

        $em = $this->getModule('Doctrine2')->em;

        $car = $em->getRepository('CarBundle:Car')->getCarsByModel($modelName);

        $this->assertGreaterThanOrEqual(1, count($car));
    }

    /**
     * Test get item model car
     */
    public function testGetItemModelCar()
    {
        $modelName = 'Panamera';

        $em = $this->getModule('Doctrine2')->em;

        $car = $em->getRepository('CarBundle:Car')->getItemModelCar($modelName, 'Panamera');

        $this->assertNotEmpty($car);
        $this->assertNotNull($car);

        $this->assertEquals($modelName, 'Panamera');

        $car = $em->getRepository('CarBundle:Car')->getItemModelCar($modelName, '911');

        $this->assertNull($car);
        $this->assertEmpty($car);
    }
}