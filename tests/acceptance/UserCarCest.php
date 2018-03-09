<?php

/**
 * Class UserCarCest
 */
class UserCarCest
{
    /**
     * @param AcceptanceTester $I
     */
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/login');

        $I->submitForm('form#login_form', [
            '_username' => 'admin@mail.com',
            '_password' => 'admin'
        ]);
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * Create user car test
     *
     * @param AcceptanceTester $I
     */
    public function createUserCarTest(AcceptanceTester $I)
    {
        $I->amOnPage('/user/cars');

        $I->seeLink('Create');

        $I->click(['link' => 'Create']);

        $I->amOnPage('/user/cars/create');

        $I->submitForm('form.user-car-form', [
            'user_bundle_user_car_type[car]' => 'Cayenne',
            'user_bundle_user_car_type[model]' => 'Cayenne',
            'user_bundle_user_car_type[engine]' => 'Cayenne Diesel',
            'user_bundle_user_car_type[transmission]' => 'Cayenne PDK',
            'user_bundle_user_car_type[createdAt][year]' => '2018',
            'user_bundle_user_car_type[createdAt][month]' => '1',
            'user_bundle_user_car_type[createdAt][day]' => '1',
            'user_bundle_user_car_type[color]' => 'black'
        ]);

        $I->amOnPage('/user/cars');

        $I->seeElement('div.user-car-item');
        $I->see('Cayenne', 'div>span');
        $I->see('Cayenne Diesel', 'div.item-engine>span');
        $I->see('Cayenne PDK', 'div.item-transmission>span');
        $I->see('black', 'div.item-color>span');
    }
}
