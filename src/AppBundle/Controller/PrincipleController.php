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
 * Class PrincipleController
 * @package AppBundle\Controller
 */
class PrincipleController extends Controller
{
    /**
     * Index action
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $principleList = $em->getRepository('AppBundle:Principles')->getList();

        return $this->render('@App/Principle/index.html.twig', [
            'principleList' => $principleList
        ]);
    }

    /**
     * View Action
     *
     * View principle item by slug
     *
     * @param string $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(string $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $item = $em->getRepository('AppBundle:Principles')->getItemBySlug($slug);

        return $this->render('@App/Principle/view.html.twig', [
            'item' => $item
        ]);
    }
}