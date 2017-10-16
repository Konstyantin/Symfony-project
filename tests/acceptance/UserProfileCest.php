<?php

/**
 * Class UserProfileCest
 */
class UserProfileCest
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
     * Profile page test
     *
     * Test profile page which store base data information about current user
     *
     * @param NoGuy $I
     */
    public function profilePageTest(NoGuy $I)
    {
        $I->amOnPage('/profile');

        $I->dontSee('hello world');
        $I->see('Logged in as adminuser');
        $I->see('Username: adminuser');
        $I->see('Email: admin@mail.com');
        $I->see('Log out', 'a');
    }

    /**
     * Profile edit page test
     *
     * Test profile edit page test which store form used for edit user data
     *
     * @param NoGuy $I
     */
    public function profileEditPageTest(NoGuy $I)
    {
        $I->amOnPage('/profile/edit');

        $I->dontSee('hello world');
        $I->see('Logged in as adminuser');

        $I->seeInField('fos_user_profile_form[username]', 'adminuser');
        $I->seeInField('fos_user_profile_form[email]', 'admin@mail.com');
        $I->seeInField('fos_user_profile_form[current_password]', '');
    }

    /**
     * Profile change password page test
     *
     * Test profile change password page which store form which used for change password user
     *
     * @param NoGuy $I
     */
    public function profileChangePasswordPageTest(NoGuy $I)
    {
        $I->amOnPage('/profile/change-password');

        $I->see('Change password page', 'h2');
        $I->dontSee('Register page');

        $I->seeInField('fos_user_change_password_form[current_password]', '');
        $I->seeInField('fos_user_change_password_form[plainPassword][first]', '');
        $I->seeInField('fos_user_change_password_form[plainPassword][second]', '');
    }
}
