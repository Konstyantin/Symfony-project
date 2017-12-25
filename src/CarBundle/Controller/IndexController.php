<?php

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class IndexController
 * @package CarBundle\Controller
 */
class IndexController extends Controller
{
    /**
     * Index action
     *
     * Index car action
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        return $this->render('CarBundle:Index:index.html.twig');
    }
}
