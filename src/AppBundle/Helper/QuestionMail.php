<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 12.02.18
 * Time: 21:11
 */
namespace AppBundle\Helper;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class QuestionMail
 * @package AppBundle\Helper
 */
class QuestionMail
{
    /**
     * @var ContainerInterface $container
     */
    protected $container;

    /**
     * QuestionMail constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * New Question
     *
     * Send mail notification about created new question
     */
    public function newQuestion()
    {
        $userMail = $this->container->getParameter('mailer_user');

        $template = $this->container->get('templating');

        $message = \Swift_Message::newInstance()
            ->setSubject('New Question')
            ->setFrom($userMail)
            ->setTo($userMail)
            ->setBody(
                $template->render(':Emails:new_question.html.twig'),
                'text/html'
            );

        $this->container->get('mailer')->send($message);
    }

    /**
     * Register question
     *
     * Send mail notification about success registered question
     *
     * @param string $email
     */
    public function registerQuestion(string $email)
    {
        $userMail = $this->container->getParameter('mailer_user');

        $template = $this->container->get('templating');

        $message = \Swift_Message::newInstance()
            ->setSubject('Thanks for your question')
            ->setFrom($userMail)
            ->setTo($email)
            ->setBody(
                $template->render(':Emails:register_question.html.twig'),
                'text/html'
            );

        $this->container->get('mailer')->send($message);
    }
}