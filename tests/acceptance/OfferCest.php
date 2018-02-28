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
        $I->seeLink('Learn more', '/offers/winner-finance');

        $I->see('Service offers', 'h2');
        $I->seeLink('Learn more', '/offers/service-offers');

        $I->click('Learn more');

        $I->seeCurrentUrlEquals('/offers/winner-finance');
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

        $I->see('« Previous');
        $I->see('Next »');

        $I->see('Learn more', ['class' => 'more-offers-btn']);
        $I->seeLink('Learn more');
    }
}
