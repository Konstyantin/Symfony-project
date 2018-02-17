<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 07.02.18
 * Time: 21:08
 */

namespace AppBundle\EventListener;

use AppBundle\Helper\QuestionMail;
use AppBundle\Event\QuestionEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class ServiceListener
 * @package AppBundle\EventListener
 */
class AppListener implements EventSubscriberInterface
{
    /**
     * @var ContainerInterface $serviceContainer
     */
    protected $serviceContainer;

    /**
     * @var Session $session
     */
    protected $session;

    /**
     * ServiceListener constructor.
     * @param ContainerInterface $serviceContainer
     * @param Session $session
     */
    public function __construct(ContainerInterface $serviceContainer, Session $session)
    {
        $this->serviceContainer = $serviceContainer;

        $this->session = $session;
    }

    /**
     * Define subscriber events
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            AppBundleEvent::QUESTION_REGISTER => 'onQuestionRegister'
        ];
    }

    /**
     * Question register event
     *
     * @param QuestionEvent $event
     */
    public function onQuestionRegister(QuestionEvent $event)
    {
        $questionMail = new QuestionMail($this->serviceContainer);

        $em = $this->serviceContainer->get('doctrine.orm.default_entity_manager');

        $question = $event->getQuestion();

        $date = time();

        $question->setDate($date);

        $em->persist($question);
        $em->flush();

        $questionMail->newQuestion();

        $questionMail->registerQuestion($question->getEmail());

        $this->session->getFlashBag()->add('success', 'Question sender success');
    }

}