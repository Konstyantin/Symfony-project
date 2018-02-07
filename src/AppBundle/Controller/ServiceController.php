<?php

namespace AppBundle\Controller;

use AppBundle\Event\ServiceEvent;
use AppBundle\EventListener\AppBundleEvent;
use AppBundle\Form\RegistrationServiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ServiceController
 * @package AppBundle\Controller
 */
class ServiceController extends Controller
{
    public function registrationAction(Request $request)
    {
        $form = $this->createForm(RegistrationServiceType::class);

        $dispatcher = $this->get('event_dispatcher');

        $event = new ServiceEvent();

        $dispatcher->dispatch(AppBundleEvent::SERVICE_REGISTER, $event);

        return $this->render('@App/Service/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
