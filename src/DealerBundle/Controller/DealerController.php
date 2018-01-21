<?php

namespace DealerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DealerController
 * @package DealerBundle\Controller
 */
class DealerController extends Controller
{
    /**
     * Index Action
     *
     * Show list dealers and information about it
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine();

        $dealerList = $em->getRepository('DealerBundle:Dealer')->getDealerList();

        return $this->render('@Dealer/Dealer/index.html.twig', [
            'dealerList' => $dealerList
        ]);
    }
}
