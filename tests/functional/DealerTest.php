<?php

/**
 * Class DealerTest
 */
class DealerTest extends \Codeception\Test\Unit
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * Test dealer list
     *
     * Test show list of dealers
     */
    public function testDealerList()
    {
        $I = $this->tester;

        $I->amOnPage('/dealer');
        $I->see('Kharkiv Center', 'h3');
        $I->see('Lviv Center', 'h3');
        $I->see('Kiev Aueroport', 'h3');

        $I->see('61000, Kharkiv, Pushkinska Street, 79/5', 'span.dealer-address');
        $I->see('79000, Lviv, Shevchenka Street, 8', 'span.dealer-address');
        $I->see('80000, Kiev, Kyivska Street, 43', 'span.dealer-address');
        $I->seeNumberOfElements('div#map', 1);
    }
}