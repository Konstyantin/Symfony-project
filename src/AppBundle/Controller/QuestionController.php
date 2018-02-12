<?php

namespace AppBundle\Controller;

use AppBundle\Form\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class QuestionController
 * @package AppBundle\Controller
 */
class QuestionController extends Controller
{
    /**
     * Index action
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(QuestionType::class);

        $form->handleRequest($request);

        return $this->render('@App/Question/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
