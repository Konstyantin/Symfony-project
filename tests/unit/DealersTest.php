<?php


class DealersTest extends \Codeception\Test\Unit
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
     * Dealer list test repository method
     */
    public function testDealerList()
    {
        $em = $this->getModule('Doctrine2')->em;

        $dealerList = $em->getRepository('DealerBundle:Dealer')->getDealerList();

        $this->assertNotNull($dealerList);

        $this->assertNotEmpty($dealerList);

        $this->assertEquals('Kharkiv', $dealerList->getCity());
    }
}