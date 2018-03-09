<?php

/**
 * Class CarCest
 */
class CarCest
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
     * View car item test
     *
     * Test view car item page
     *
     * @param AcceptanceTester $I
     */
    public function viewCarItemTest(AcceptanceTester $I)
    {
        $I->amOnPage('/model');

        $I->see('Cayenne', 'a');

        $I->click(['link' => 'Cayenne']);

        $I->amOnPage('/model/cayenne');

        $I->see('Cayenne', 'a');

        $I->seeLink('Cayenne');

        $I->click(['link' => 'Cayenne']);

        $I->amOnPage('/models/cayenne/cayenne');
        $I->see('Technical params', 'h2');
        $I->see('Features', 'h2');
        $I->see('Cayenne', 'h3.text-right');
        $I->see('Manual', 'th.configuration-type');
        $I->see('PDK', 'th.configuration-type');
        $I->see('Price', 'th');
        $I->see('Power', 'th');
        $I->see('Acceleration 0 - 100 km/h', 'th');
        $I->see('Top Speed', 'th');
        $I->see('Fuel Consumption Combine', 'th');

        $I->see('Dynamics', 'p.feature-title');
        $I->see('Feature', 'p.feature-title');
        $I->see('New Dynamics', 'span');
        $I->see('New Feature', 'span');

        $I->see('All technical specs', 'a.view-car-details-btn');

        $I->see('Dynamics', 'p.feature-title');
        $I->see('New Dynamics', 'div.short-description>span');

        $I->see('Feature', 'p.feature-title');
        $I->see('New Feature', 'div.short-description>span');

        $I->click(['link' => 'All technical specs']);

        $I->amOnPage('/models/cayenne/cayenne/specs');
    }

    /**
     * View specs item test
     *
     * Test open car item specs page
     *
     * @param AcceptanceTester $I
     */
    public function viewSpecsItemTest(AcceptanceTester $I)
    {
        $I->amOnPage('/models/911/911/specs');

        $I->see('911', 'a');

        $I->see('Engine', 'th');
        $I->see('Fuel', 'th');
        $I->see('Dynamics', 'th');
        $I->see('Transmission', 'th');
        $I->see('Body', 'th');
        $I->see('Price', 'th');

        $I->click(['link' => '911']);

        $I->seeCurrentUrlEquals('/models/911/911');
    }
}
