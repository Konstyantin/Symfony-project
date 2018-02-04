<?php

namespace UserBundle\Controller;

use AppBundle\Entity\UserCar;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Form\UserCarType;

/**
 * Class UserCarController
 * @package UserBundle\Controller
 */
class UserCarController extends Controller
{
    /**
     * Index action
     *
     * Show car list for current user
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $userId = $this->getUser()->getId();

        $em = $this->getDoctrine()->getManager();

        $carList = $em->getRepository('AppBundle:UserCar')->getUserCarList($userId);

        return $this->render('@User/userCar/index.html.twig', [
            'carList' => $carList
        ]);
    }

    /**
     * Create action
     *
     * Create new user car item
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(UserCarType::class);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $data = $form->getData();

            $userCar = new UserCar();
            $userCar->setCarName($data['carName']);
            $userCar->setUser($user);
            $userCar->setModel($data['model']);
            $userCar->setEngine($data['engine']);
            $userCar->setTransmission($data['transmission']);
            $userCar->setCreatedAt($data['createdAt']);
            $userCar->setColor($data['color']);

            $em->persist($userCar);
            $em->flush();

            $this->addFlash('success', 'Car added success');
        }

        return $this->render('@User/userCar/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Edit action
     *
     * Edit user car item data value by passed car_id and user_id parameters
     *
     * @param Request $request
     * @param int $carId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, int $carId)
    {
        $userId = $this->getUser()->getId();

        $em = $this->getDoctrine()->getManager();

        $userCar = $em->getRepository('AppBundle:UserCar')->getUserCar($carId, $userId);

        $form = $this->createForm(UserCarType::class, $userCar);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {

            $data = $form->getData();

            $userCar->setCarName($data->getCarName());
            $userCar->setModel($data->getModel());
            $userCar->setEngine($data->getEngine());
            $userCar->setTransmission($data->getTransmission());
            $userCar->setCreatedAt($data->getCreatedAt());
            $userCar->setColor($data->getColor());

            $em->persist($userCar);
            $em->flush();

            $this->addFlash('success', 'Car edited success');
        }

        return $this->render('@User/userCar/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
