<?php

/**
 * Class EngineTest
 */
class EngineTest extends \Codeception\Test\Unit
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
        $name = 'Macan Diesel';

        $em = $this->getModule('Doctrine2')->em;

        $engine = $em->getRepository('CarBundle:Engine')->getItemByName($name);

        $this->assertNotNull($engine);

        $this->assertNotEmpty($engine);

        $this->assertEquals($engine->getName(), $name);

        $engine = $em->getRepository('CarBundle:Engine')->getItemByName('123');

        $this->assertEmpty($engine);

        $this->assertNull($engine);
    }
}