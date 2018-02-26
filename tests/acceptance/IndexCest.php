<?php

/**
 * Class IndexCest
 */
class IndexCest
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
     * Index page test
     *
     * @param AcceptanceTester $I
     */
    public function indexPageTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Models', 'h3');
        $I->see('Service', 'h3');

        $I->see('911');
        $I->see('Cayenne');
        $I->see('Panamera');
        $I->see('Macan');
        $I->see('718');

        $I->seeLink('911');
        $I->seeLink('Cayenne');
        $I->seeLink('Panamera');
        $I->seeLink('Macan');
        $I->seeLink('718');

        $I->see('Available cars', 'span.service-item-title');
        $I->see('Dealers', 'span.service-item-title');
        $I->see('Offers', 'span.service-item-title');

        $I->seeLink('Available cars');
        $I->seeLink('Dealers');
        $I->seeLink('Offers');
    }

    /**
     * Dealer list test
     *
     * @param AcceptanceTester $I
     */
    public function dealerPageTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        $I->click(['class' => 'dealers-service']);

        $I->seeCurrentUrlEquals('/dealer/');

        $I->see('Dealers', 'p');

        $I->see('Kharkiv Center', 'h3');
        $I->see('Lviv Center', 'h3');
        $I->see('Kiev Aueroport', 'h3');

        $I->seeElement('#map');
    }

    /**
     * Offer page test
     *
     * @param AcceptanceTester $I
     */
    public function offerPageTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        $I->click(['class' => 'special-offers-service']);

        $I->seeCurrentUrlEquals('/offers');

        $I->see('Offers', 'h2.text-center');

        $I->see('Winner finance', 'h2');
        $I->see('Service offers', 'h2');

        $I->see('Learn more', '.more-offers-btn');
    }

    /**
     * Available page test
     *
     * @param AcceptanceTester $I
     */
    public function availablePageTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        $I->click(['class' => 'available-cars-service']);

        $I->seeCurrentUrlEquals('/cars/available');

        $I->see('Available car list', 'p');
        $I->see('911');
        $I->see('Cars Available');

        $I->click(['id' => '911']);
        $I->seeCurrentUrlEquals('/models/911/911');
    }
}
