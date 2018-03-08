<?php

/**
 * Class ModelCest
 */
class ModelCest
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
     * Model list test
     *
     * @param AcceptanceTester $I
     */
    public function modelListToTest(AcceptanceTester $I)
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

        $I->click(['link' => 'Macan']);
    }

    /**
     * Model car test
     *
     * @param AcceptanceTester $I
     */
    public function modelCarTest(AcceptanceTester $I)
    {
        $I->amOnPage('/model');

        $I->see('911', '#911');
        $I->click(['id' => '911']);

        $I->seeCurrentUrlEquals('/model/911');
        $I->see('911');
    }
}
