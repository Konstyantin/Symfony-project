<?php


class CarCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }


    public function viewCarItemTest(AcceptanceTester $I)
    {
        $I->amOnPage('/model');

        $I->see('Panamera');
        $I->see('Macan');
        $I->see('Cayenne');
        $I->see('Panamera');
        $I->see('911');
        $I->see('718');

        $I->see('Model details', 'h3');
        $I->see('Porsche', 'ol.breadcrumb');

        $I->amOnPage('/model/911');
        $I->amOnPage('/models/911/911');

        $I->see('Technical params', 'h2');
        $I->see('Features', 'h2');
        $I->see('911', 'h3.text-right');

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

//        $I->click(['class' => 'view-car-details-btn']);
    }
}
