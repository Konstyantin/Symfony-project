<?php

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ModelController
 * @package CarBundle\Controller
 */
class ModelController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine();

        $modelList = $em->getRepository('CarBundle:Model')->getModelsList();

        return $this->render('@Car/Model/index.html.twig', [
            'modelList' => $modelList
        ]);
    }
}
