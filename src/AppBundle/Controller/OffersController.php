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

        $pagination = $this->get('knp_paginator');

        $offersList = $em->getRepository('AppBundle:Offers')->getOffersByCategory($category);

        $pagination = $pagination->paginate(
            $offersList,
            $request->query->getInt('page', 1),
            1
        );

        return $this->render('@App/Offers/categoryOffers.html.twig', [
            'pagination' => $pagination
        ]);
    }

    /**
     * View Action
     *
     * @param string $title
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(string $title)
    {
        $em = $this->getDoctrine()->getManager();

        $offer = $em->getRepository('AppBundle:Offers')->getOfferByTitle($title);
        
        return $this->render('@App/Offers/view.html.twig', [
            'offer' => $offer
        ]);
    }
}
