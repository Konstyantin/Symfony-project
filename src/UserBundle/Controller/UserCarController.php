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
        $user = $this->getUser();

        $em = $this->getDoctrine()->getManager();

        $carList = $em->getRepository('AppBundle:UserCar')->getUserCarList($user->getId());

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
}
