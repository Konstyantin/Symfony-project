<?php

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class CarController
 * @package CarBundle\Controller
 */
class CarController extends Controller
{
    /**
     * View Action
     *
     * Show common car item information by model and car name
     *
     * @param string $model
     * @param string $carName
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(string $model, string $carName)
    {
        $em = $this->getDoctrine();

        $car = $em->getRepository('CarBundle:Car')->getItemModelCar($model, $carName);

        return $this->render('CarBundle:Index:index.html.twig', [
            'car' => $car
        ]);
    }
}
