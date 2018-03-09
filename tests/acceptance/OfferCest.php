<?php

/**
 * Class OfferCest
 */
class OfferCest
{
    /**
     * @param AcceptanceTester $I
     */
    public function _before(AcceptanceTester $I)
    {
    }

    /**
     * @param AcceptanceTester $I
     */
    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * Index offers test
     *
     * @param AcceptanceTester $I
     */
    public function indexOffersTest(AcceptanceTester $I)
    {
        $I->amOnPage('/offers');

        $I->see('Winner finance', 'h2');
        $I->seeLink('Learn more');

        $I->see('Service offers', 'h2');
        $I->seeLink('Learn more');

        $I->seeNumberOfElements('div.offers-category-item', [0, 1000]);
    }

    /**
     * Category offers test
     *
     * @param AcceptanceTester $I
     */
    public function categoryOfferTest(AcceptanceTester $I)
    {
        $I->amOnPage('/offers/service-offers');

        $I->see('Service offers', 'p');
        $I->dontSee('Winner finance', 'p');

        $I->seeElement('div.offers-pagination');

        $I->seeNumberOfElements('div.offers-item', [1,2]);

        $I->see('« Previous');
        $I->see('Next »');

        $I->see('Learn more', ['class' => 'more-offers-btn']);
        $I->seeLink('Learn more');
    }

    /**
     * Offer item test
     *
     * @param AcceptanceTester $I
     */
    public function offerItemTest(AcceptanceTester $I)
    {
        $I->amOnPage('/offers/service-offers');

        $I->seeLink('Learn more');

        $I->click(['link' => 'Learn more']);

        $I->seeElement('div.offer-view-container');

        $I->seeInCurrentUrl('/offer/');
    }
}
