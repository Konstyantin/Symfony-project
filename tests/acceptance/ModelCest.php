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

        $I->seeNumberOfElements('div.model-item', [5, 100]);
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
        $I->click(['link' => '911']);

        $I->dontSeeCurrentUrlEquals('/model/Caynne');
        $I->dontSee('Cayenne');

        $I->seeCurrentUrlEquals('/model/911');
        $I->see('911');
    }

    /**
     * Search model test
     *
     * @param AcceptanceTester $I
     */
    public function searchModelTest(AcceptanceTester $I)
    {
        $I->amOnPage('/model');

        $I->seeElement('button.show-search-form-btn');

        $I->click(['class' => 'show-search-form-btn']);

        $I->seeElement('input.model-name-field');

        $I->seeElement('form.search-model');

        $I->submitForm('form.search-model', [
            'car_bundle_model_search_type[name]' => '911'
        ]);

        $I->wait(2);
        $I->dontSeeElement('a#Panamera');

        $I->see('911', 'span');
        $I->dontSee('Panamera', 'span');
    }
}
