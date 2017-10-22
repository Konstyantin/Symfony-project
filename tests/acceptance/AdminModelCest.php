<?php


/**
 * Class AdminModelCest
 */
class AdminModelCest
{
    /**
     * Before test method make login as SUPER_ADMIN
     *
     * @param NoGuy $I
     */
    public function _before(NoGuy $I)
    {
        $I->amOnPage('/login');

        $I->submitForm('#login_form', [
            '_username' => 'admin@mail.com',
            '_password' => 'admin'
        ], '_submit');
    }

    public function _after(NoGuy $I)
    {
    }


    /**
     * Admin dashboard model page test
     *
     * Test load admin model dashboard page test
     *
     * @param NoGuy $I
     */
    public function adminDashboardModelPageTest(NoGuy $I)
    {
        $I->amOnPage('/admin/car/model/list');

        $I->see('Sonata Admin', 'span');
        $I->see('No result', 'span.info-box-text');
        $I->dontSee('Category', 'h4.box-title');

    }

    /**
     * Admin create model page test
     *
     * Test load admin model dashboard page test
     *
     * @param NoGuy $I
     */
    public function adminCreateModelPageTest(NoGuy $I)
    {
        $I->amOnPage('/admin/car/model/create');
        $I->see('Model', 'h4.box-title');
        $I->dontSee('Category', 'h4.box-title');

        $I->see('Parent', 'label');
        $I->see('Name', 'label');
    }
}
