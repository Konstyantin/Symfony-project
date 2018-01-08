<?php

namespace AppBundle\Controller;

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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $sliderCategory = $em->getRepository('ApplicationSonataClassificationBundle:Category')
            ->findOneBy(['name' => 'Slider']);

        $sliderList = $em->getRepository('ApplicationSonataMediaBundle:Media')
            ->findBy(['category' => $sliderCategory]);

        $modelList = $em->getRepository('CarBundle:Model')->getModelsList();

        $modelCarList = $em->getRepository('CarBundle:Model')->findAll();

        return $this->render('@App/Index/index.html.twig', [
            'sliderList' => $sliderList,
            'modelList' => $modelList
        ]);
    }
}
