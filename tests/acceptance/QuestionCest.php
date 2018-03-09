<?php


/**
 * Class QuestionCest
 */
class QuestionCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * Question test
     *
     * @param AcceptanceTester $I
     */
    public function questionTest(AcceptanceTester $I)
    {
        $I->amOnPage('/question');

        $I->see('Question', 'p');

        $I->submitForm('form.question-form', [
            'app_bundle_question_type[fullName]' => 'Kostya Nagula',
            'app_bundle_question_type[phone]' => '380669936205',
            'app_bundle_question_type[email]' => 'kostyannagula@gmail.com',
            'app_bundle_question_type[subject]' => 'Question subject test',
            'app_bundle_question_type[body]' => 'Question body test',
        ]);

        $I->wait(3);

        $I->see('Question sender success');

        $I->seeElement('div.alert-success');
    }
}
