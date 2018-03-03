<?php

/**
 * Class TransmissionTest
 */
class TransmissionTest extends \Codeception\Test\Unit
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
     * Test get item by name
     */
    public function testGetItemByName()
    {
        $em = $this->getModule('Doctrine2')->em;

        $transmissionItem = $em->getRepository('CarBundle:Transmission')->getFirstTransmission();

        $transmissionItemName = $transmissionItem->getName();

        $transmissionItemNameFail = $transmissionItemName . 'fail';

        $transmission = $em->getRepository('CarBundle:Transmission')->getItemByName($transmissionItemName);

        $this->assertNotEmpty($transmission);

        $this->assertNotNull($transmission);

        $this->assertEquals($transmissionItemName, $transmission->getName());

        $transmissionFail = $em->getRepository('CarBundle:Transmission')->getItemByName($transmissionItemNameFail);

        $this->assertEmpty($transmissionFail);

        $this->assertNull($transmissionFail);
    }

    /**
     * Test get first transmission
     */
    public function testGetFirstTransmission()
    {
        $em = $this->getModule('Doctrine2')->em;

        $transmission = $em->getRepository('CarBundle:Transmission')->getFirstTransmission();

        $this->assertNotNull($transmission);

        $this->assertNotEmpty($transmission);

        $this->assertNotEmpty($transmission->getName());
    }
}