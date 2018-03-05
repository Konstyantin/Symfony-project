<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 04.03.18
 * Time: 16:10
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class NewsController
 * @package AppBundle\Controller
 */
class NewsController extends Controller
{
    /**
     * Index action
     *
     * Show list of news collection
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $pagination = $this->get('knp_paginator');

        $news = $em->getRepository('AppBundle:News')->getListQuery();

        $pagination = $pagination->paginate(
            $news,
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('@App/News/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * View Action
     *
     * View news item by slug
     *
     * @param string $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(string $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $item = $em->getRepository('AppBundle:News')->getItemBySlug($slug);

        return $this->render('@App/News/view.html.twig', [
            'item' => $item
        ]);
    }
}