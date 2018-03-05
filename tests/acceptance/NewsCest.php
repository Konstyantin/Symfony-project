<?php

/**
 * Class NewsCest
 */
class NewsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * News list test
     *
     * @param AcceptanceTester $I
     */
    public function newsListTest(AcceptanceTester $I)
    {
        $I->amOnPage('/news');

        $I->seeLink('Learn more');

        $I->click(['class' => 'more-news-btn']);

        $I->seeCurrentUrlEquals('/news/first-news');

        $I->see('First news', 'p');

        $I->see('First new description', 'p');
    }

    /**
     * New item test
     *
     * @param AcceptanceTester $I
     */
    public function newsItemTest(AcceptanceTester $I)
    {
        $I->amOnPage('/news/first-news');

        $I->see('First news', 'p');

        $I->see('First new description', 'p');
    }
}
