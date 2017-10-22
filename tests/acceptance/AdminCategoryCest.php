<?php

/**
 * Class AdminCategoryCest
 */
class AdminCategoryCest
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
     * Admin dashboard category page test
     *
     * Test load admin category dashboard page test
     *
     * @param NoGuy $I
     */
    public function adminDashboardCategoryPageTest(NoGuy $I)
    {
        $I->amOnPage('/admin/app/category/list');

        $I->see('Sonata Admin', 'span');
        $I->see('No result', 'span.info-box-text');
        $I->dontSee('Model', 'h4.box-title');
    }

    /**
     * Admin create category page test
     *
     * Test load admin category dashboard page test
     *
     * @param NoGuy $I
     */
    public function adminCreateCategoryPageTest(NoGuy $I)
    {
        $I->amOnPage('/admin/app/category/create');
        $I->see('Category', 'h4.box-title');
        $I->dontSee('Model', 'h4.box-title');

        $I->see('Parent', 'label');
        $I->see('Name', 'label');
    }
}
