<?php

namespace AppBundle\Controller;

use AppBundle\Constants\SonataClassificationCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class IndexController
 * @package AppBundle\Controller
 */
class IndexController extends Controller
{
    /**
     * Index action
     *
     * Show main page of the project
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sliderCategory = $em->getRepository('ApplicationSonataClassificationBundle:Category')
            ->findOneBy(['name' => SonataClassificationCategory::SLIDER_CATEGORY]);

        $indexGalleryCategory = $em->getRepository('ApplicationSonataClassificationBundle:Category')
            ->findOneBy(['name' => SonataClassificationCategory::GALLERY_CATEGORY]);

        $sliderList = $em->getRepository('ApplicationSonataMediaBundle:Media')->findBy(['category' => $sliderCategory]);

        $galleryList = $em->getRepository('ApplicationSonataMediaBundle:Media')
            ->findBy(['category' => $indexGalleryCategory]);

        $modelList = $em->getRepository('CarBundle:Model')->getModelsList();

        return $this->render('@App/Index/index.html.twig', [
            'sliderList' => $sliderList,
            'modelList' => $modelList,
            'galleryList' => $galleryList
        ]);
    }

    /**
     * Contact action
     *
     * Show base contact information of company
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dealerList = $em->getRepository('DealerBundle:Dealer')->getDealerList();

        return $this->render('@App/Index/contact.html.twig', [
            'dealerList' => $dealerList
        ]);
    }

    /**
     * Museum action
     *
     * Show static museum data of company
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function museumAction()
    {
        return $this->render('@App/Index/museum.html.twig');
    }
}
