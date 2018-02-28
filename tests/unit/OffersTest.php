<?php

/**
 * Class OffersTest
 */
class OffersTest extends \Codeception\Test\Unit
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
     *
     */
    public function testGetOffersList()
    {
        $em = $this->getModule('Doctrine2')->em;

        $offersList = $em->getRepository('AppBundle:Offers')->getOffersList();

        $this->assertNotEmpty($offersList);

        $this->assertNotNull($offersList);
    }

    public function testGetOfferByTitle()
    {
        $em = $this->getModule('Doctrine2')->em;

        $offer = $em->getRepository('AppBundle:Offers')->getOfferByTitle('porsches-original-brake-discs-and-pads-are-now-on-the-new-acquisition-terms');

        $this->assertNotEmpty($offer);

        $this->assertNotNull($offer);

        $this->assertEquals('Porsche\'s original brake discs and pads are now on the new acquisition terms', $offer->getTitle());
    }
}