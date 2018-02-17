<?php

namespace ServiceBundle\Controller;

use ServiceBundle\Event\ServiceEvent;
use ServiceBundle\EventListener\ServiceBundleEvent;
use AppBundle\Form\RegistrationServiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ServiceController
 * @package ServiceBundle\Controller
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

            $dispatcher->dispatch(ServiceBundleEvent::SERVICE_REGISTER, $event);

            return $this->redirectToRoute('service_registration');
        }

        return $this->render('@Service/Service/register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Drive selection action
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function driveSelectionAction()
    {
        return $this->render('@Service/Service/drive-selection.html.twig');
    }
}
