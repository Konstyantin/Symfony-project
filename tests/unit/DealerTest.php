<?php

/**
 * Class DealerTest
 */
class DealerTest extends \Codeception\Test\Unit
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
     * Test get dealer list
     */
    public function testGetDealerList()
    {
        $em = $this->getModule('Doctrine2')->em;

        $dealerList = $em->getRepository('DealerBundle:Dealer')->getDealerList();

        $this->assertNotNull($dealerList);
    }
}