<?php

namespace AppBundle\Controller;

use AppBundle\Form\RegistrationServiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ServiceController extends Controller
{
    public function registrationAction()
    {
        $form = $this->createForm(RegistrationServiceType::class);

        return $this->render('@App/Service/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
