<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        $em = $this->getDoctrine()->getManager();

        $offersCategoryList = $em->getRepository('AppBundle:OffersCategory')->getCategoryList();

        return $this->render('@App/Offers/index.html.twig', [
            'offersCategoryList' => $offersCategoryList
        ]);
    }

    /**
     * Category offers action
     *
     * @param Request $request
     * @param string $category
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function categoryOffersAction(Request $request, string $category)
    {
        $em = $this->getDoctrine()->getManager();

        $offersList = $em->getRepository('AppBundle:Offers')->getOffersByCategory($category);

        return $this->render('@App/Offers/categoryOffers.html.twig');
    }
}
