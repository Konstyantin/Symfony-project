<?php

/**
 * Class ConfigurationTest
 */
class ConfigurationTest extends \Codeception\Test\Unit
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
     * Test get item by car name
     */
    public function testGetItemByCarName()
    {
        $carName = '911';

        $em = $this->getModule('Doctrine2')->em;

        $configuration = $em->getRepository('CarBundle:Configuration')->getItemByCarName($carName);

        $this->assertNotEmpty($configuration);

        $this->assertNotNull($configuration);

        $this->assertEquals($carName, $configuration->getCarName());
    }
}