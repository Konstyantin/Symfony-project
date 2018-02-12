<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 12.02.18
 * Time: 20:20
 */

namespace AppBundle\Event;

use AppBundle\Entity\Question;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class QuestionEvent
 * @package AppBundle\Event
 */
class QuestionEvent extends Event
{
    /**
     * @var Question $question
     */
    protected $question;

    /**
     * QuestionEvent constructor.
     * @param Question $question
     */
    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /**
     * Get question
     *
     * Return question entity
     *
     * @return Question
     */
    public function getQuestion()
    {
        return $this->question;
    }
}