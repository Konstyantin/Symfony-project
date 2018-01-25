<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class OffersController
 * @package AppBundle\Controller
 */
class OffersController extends Controller
{
    /**
     * Index Action
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine();

        $offersList = $em->getRepository('AppBundle:Offers')->getOffersList();

        return $this->render('@App/Offers/index.html.twig', [
            'offersList' => $offersList
        ]);
    }
}
