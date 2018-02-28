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
     * Show company offers list
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
     * Show offers list by passed offers category
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

        $category = $em->getRepository('AppBundle:OffersCategory')->getCategoryBySlug($category);

        $pagination = $pagination->paginate(
            $offersList,
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('@App/Offers/categoryOffers.html.twig', [
            'pagination' => $pagination,
            'category' => $category
        ]);
    }

    /**
     * View Action
     *
     * Show information by current offer item
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
