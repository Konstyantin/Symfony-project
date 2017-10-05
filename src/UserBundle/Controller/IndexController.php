<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class IndexController
 * @package UserBundle\Controller
 */
class IndexController extends Controller
{
    /**
     * Index action
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('@User/Index/index.html.twig');
    }
}
