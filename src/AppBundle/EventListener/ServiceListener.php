<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 07.02.18
 * Time: 21:08
 */

namespace AppBundle\EventListener;

use AppBundle\Event\ServiceEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class ServiceListener
 * @package AppBundle\EventListener
 */
class ServiceListener implements EventSubscriberInterface
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
            AppBundleEvent::SERVICE_REGISTER => 'onServiceRegister'
        ];
    }

    /**
     * Service register event
     *
     * @param ServiceEvent $event
     */
    public function onServiceRegister(ServiceEvent $event)
    {
        $em = $this->serviceContainer->get('doctrine.orm.default_entity_manager');

        $carService = $event->getService();

        $this->sendNotifier($carService);

        $em->persist($carService);
        $em->flush();

        $this->session->getFlashBag()->add('success', 'Service register success');
    }

    /**
     * Send notifier
     *
     * @param $data
     */
    private function sendNotifier($data)
    {
        $userMail = $this->serviceContainer->getParameter('mailer_user');

        $template = $this->serviceContainer->get('templating');

        $message = \Swift_Message::newInstance()
            ->setSubject('Registration service')
            ->setFrom($userMail)
            ->setTo($data->getEmail())
            ->setBody(
                $template->render(':Emails:service_register.html.twig', [
                    'firstName' => $data->getFirstName(),
                    'lastName' => $data->getLastName(),
                    'carName' => $data->getCarName(),
                    'model' => $data->getModel(),
                    'dealer' => $data->getDealer()
                ]),
                'text/html'
            );

        $this->serviceContainer->get('mailer')->send($message);
    }
}