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

        return $this->render('CarBundle:Car:index.html.twig', [
            'car' => $car
        ]);
    }

    /**
     * View specs Action
     *
     * Show all car item information by model and car name
     *
     * @param string $model
     * @param string $carName
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewSpecsAction(string $model, string $carName)
    {
        $em = $this->getDoctrine();

        $car = $em->getRepository('CarBundle:Car')->getItemModelCar($model, $carName);

        return $this->render('@Car/Car/specs.html.twig', [
            'car' => $car
        ]);
    }

    /**
     * Available list Action
     *
     * Show all car item which is available
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function availableListAction()
    {
        $em = $this->getDoctrine();

        $carList = $em->getRepository('CarBundle:Car')->getAvailableCarList();

        return $this->render('@Car/Car/available.html.twig', [
            'carList' => $carList
        ]);
    }
}
