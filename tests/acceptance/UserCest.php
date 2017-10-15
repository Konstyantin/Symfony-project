<?php

class UserCest
{
    public function _before(NoGuy $I)
    {
    }

    public function _after(NoGuy $I)
    {
    }

    /**
     * Test home page
     *
     * @param NoGuy $I
     */
    public function homePageTest(NoGuy $I)
    {
        $I->amOnPage('/');
        $I->see('Welcome to', 'span');
        $I->dontSee('hello world');
    }

    /**
     * Login page test
     *
     * Test login page layout which store login form
     *
     * @param NoGuy $I
     */
    public function loginPageTest(NoGuy $I)
    {
        $I->amOnPage('/login');
        $I->see('Login page', 'h2');

        $I->dontSee('Registration page', 'h2');

        $I->seeInField('form input[name=_username]', '');
        $I->seeInField('form input[name=_password]', '');
        $I->dontSeeCheckboxIsChecked('form input[type=checkbox]');
    }

    /**
     * Login action test
     *
     * Test login action, fill login form field test data and check login action
     *
     * @param NoGuy $I
     */
    public function loginActionTest(NoGuy $I)
    {
        $I->amOnPage('/login');

        $I->submitForm('#login_form', [
            '_username' => 'admin@mail.com',
            '_password' => 'admin'
        ], '_submit');

        $I->dontSee('Invalid credentials.');
    }

    /**
     * Login fail action test
     *
     * Test file action? fill login form failure data value and check failure login action
     *
     * @param NoGuy $I
     */
    public function loginFailActionTest(NoGuy $I)
    {
        $I->amOnPage('/login');

        $I->submitForm('#login_form', [
            '_username' => 'admin@mail.com123',
            '_password' => 'admin123'
        ], '_submit');

        $I->see('Invalid credentials.');
    }
}
