<?php

/**
 * Class PrinciplesCest
 */
class PrinciplesCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * Principles list test
     *
     * @param AcceptanceTester $I
     */
    public function principlesListTest(AcceptanceTester $I)
    {
        $I->amOnPage('/principle');

        $I->see('Principle', 'p');

        $I->seeLink('Learn more', '/principle/first-principles');

        $I->click(['class' => 'more-principle-btn']);

        $I->seeCurrentUrlEquals('/principle/first-principles');
    }

    /**
     * Principles item test
     *
     * @param AcceptanceTester $I
     */
    public function principlesItemTest(AcceptanceTester $I)
    {
        $I->amOnPage('/principle/first-principles');

        $I->see('First principles', 'p');

        $I->see('First principles description', 'p');
    }
}
