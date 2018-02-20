<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Question;
use AppBundle\Event\QuestionEvent;
use AppBundle\EventListener\AppBundleEvent;
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
     * Create action
     *
     * Create new question and send notification about create created new question
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(QuestionType::class);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {

            $data = $form->getData();

            $dispatcher = $this->get('event_dispatcher');

            $event = new QuestionEvent($data);

            $dispatcher->dispatch(AppBundleEvent::QUESTION_REGISTER, $event);
        }

        return $this->render('@App/Question/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
