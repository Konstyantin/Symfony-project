<?php

/**
 * Class UserCest
 */
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

    public function registerPageTest(NoGuy $I)
    {
        $I->amOnPage('/register');

        $I->see('Registration page', 'h2');

        $I->dontSee('Login page', 'h2');
        $I->seeInField("#fos_user_registration_form_username", '');
        $I->seeInField('#fos_user_registration_form_email', '');
        $I->seeInField('#fos_user_registration_form_plainPassword_first', '');
        $I->seeInField('#fos_user_registration_form_plainPassword_second', '');
    }

    /**
     * Register action test
     *
     * Register action test registration new user on register page by fill
     * registration form field used test data value
     *
     * @param NoGuy $I
     */
    public function registerActionTest(NoGuy $I)
    {
        $I->amOnPage('/register');

        $I->see('Registration page', 'h2');

        $I->dontSee('Login page', 'h2');

        $I->submitForm('form[name=fos_user_registration_form]', [
            'fos_user_registration_form[email]' => 'test_user@gmail.com',
            'fos_user_registration_form[username]' => 'test_user_name',
            'fos_user_registration_form[plainPassword][first]' => '123456789',
            'fos_user_registration_form[plainPassword][second]' => '123456789'
        ]);

        $I->dontSee('Registration page', 'h2');
    }

    /**
     * Register fail action test
     *
     * Register action fail test register new user fill registration form failure data value
     *
     * @param NoGuy $I
     */
    public function registerFailActionTest(NoGuy $I)
    {
        $I->amOnPage('/register');

        $I->see('Registration page', 'h2');

        $I->dontSee('Login page', 'h2');

        $I->submitForm('form[name=fos_user_registration_form]', [
            'fos_user_registration_form[email]' => 'test_user@gmail.com',
            'fos_user_registration_form[username]' => 'test_user_name',
            'fos_user_registration_form[plainPassword][first]' => '12345678933',
            'fos_user_registration_form[plainPassword][second]' => '12345678922'
        ]);

        $I->see('Registration page', 'h2');
    }
}
