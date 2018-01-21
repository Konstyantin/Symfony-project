<?php

namespace DealerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DealerBundle:Default:index.html.twig');
    }
}
