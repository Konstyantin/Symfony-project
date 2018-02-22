<?php

/**
 * Class DealerCest
 */
class DealerCest
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
     * See dealer list 
     *
     * @param AcceptanceTester $I
     */
    public function dealerListTest(AcceptanceTester $I)
    {
        $I->amOnPage('/dealer/list');

        $I->see('Kharkiv Center', 'h3');
        $I->see('Lviv Center', 'h3');
        $I->see('Kiev Aueroport', 'h3');

        $I->see('61000, Kharkiv, Pushkinska Street, 79/5', 'span.dealer-address');
        $I->see('79000, Lviv, Shevchenka Street, 8', 'span.dealer-address');
        $I->see('80000, Kiev, Kyivska Street, 43', 'span.dealer-address');
        $I->seeNumberOfElements('div#map', 1);
    }
}
