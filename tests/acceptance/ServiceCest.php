<?php

/**
 * Class ServiceCest
 */
class ServiceCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * Service regitser test
     *
     * @param AcceptanceTester $I
     */
    public function serviceRegisterTest(AcceptanceTester $I)
    {
        $I->amOnPage('/service/registration');

        $I->see('Registration to service');

        $I->submitForm('form.service-registration-form', [
            'app_bundle_registration_service_type[firstName]' => 'Kostya',
            'app_bundle_registration_service_type[lastName]' => 'Nagula',
            'app_bundle_registration_service_type[email]' => 'kostyannagula@gmail.com',
            'app_bundle_registration_service_type[phone]' => '380669936205',
            'app_bundle_registration_service_type[car]' => 'Cayenne',
            'app_bundle_registration_service_type[model]' => 'Cayenne',
            'app_bundle_registration_service_type[vin]' => '1231232',
            'app_bundle_registration_service_type[mileage]' => '12311',
            'app_bundle_registration_service_type[licensePlate]' => '123123',
            'app_bundle_registration_service_type[dealer]' => 'Kharkiv Center',
            'app_bundle_registration_service_type[date][date][year]' => '2018',
            'app_bundle_registration_service_type[date][date][month]' => '3',
            'app_bundle_registration_service_type[date][date][day]' => '1',
            'app_bundle_registration_service_type[date][time][hour]' => '1',
            'app_bundle_registration_service_type[date][time][minute]' => '01',
        ]);

        $I->see('Service register success');

        $I->seeElement('div.alert-success');
    }
}
