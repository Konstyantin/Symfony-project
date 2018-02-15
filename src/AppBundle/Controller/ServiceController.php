<?php

namespace AppBundle\Controller;

use AppBundle\Event\ServiceEvent;
use AppBundle\EventListener\AppBundleEvent;
use AppBundle\Form\RegistrationServiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        $user = $this->getUser();

        $userId = ($user) ? $user->getId() : null;

        $form = $this->createForm(RegistrationServiceType::class, null, ['user' => $userId]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $dispatcher = $this->get('event_dispatcher');

            $event = new ServiceEvent($data, $user);

            $dispatcher->dispatch(AppBundleEvent::SERVICE_REGISTER, $event);

            return $this->redirectToRoute('service_registration');
        }

        return $this->render('@App/Service/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
