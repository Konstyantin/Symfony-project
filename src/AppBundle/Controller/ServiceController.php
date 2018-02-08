<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CarService;
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
    /**
     * Registration service
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registrationAction(Request $request)
    {
        $form = $this->createForm(RegistrationServiceType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $dispatcher = $this->get('event_dispatcher');

            $event = new ServiceEvent($data);

            $dispatcher->dispatch(AppBundleEvent::SERVICE_REGISTER, $event);
        }

        return $this->render('@App/Service/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
