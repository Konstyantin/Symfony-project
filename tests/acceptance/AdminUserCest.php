<?php


class AdminUserCest
{
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
     * Admin dashboard page test
     *
     * Test load admin page dashboard
     *
     * @param NoGuy $I
     */
    public function adminDashboardPageTest(NoGuy $I)
    {
        $I->amOnPage('/admin/dashboard');

        $I->see('Sonata Admin', 'span');
        $I->dontSee('Welcome to', 'span');
    }

    /**
     * Admin dashboard user page test
     *
     * View dashboard user admin page and emulate add new user click button
     *
     * @param NoGuy $I
     */
    public function adminDashboardUserPageTest(NoGuy $I)
    {
        $I->amOnPage('/admin/user/user/list');

        $I->see('Sonata Admin', 'span');
        $I->see('Id', 'a');
        $I->see('Username', 'a');
        $I->see('Email', 'a');

        $I->see('Add new', 'a');
        $I->see('Filters', 'a');

        $I->click(['class' => 'sonata-action-element', 'url' => '/admin/user/user/create']);
        $I->see('Username', 'label');
        $I->see('Email', 'label');
        $I->see('Password', 'label');
        $I->see('Roles', 'label');
        $I->see('Enable', 'label');
    }
}
