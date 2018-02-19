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

            $em->getRepository('AppBundle:UserCar')->create($data, $user);

            $this->addFlash('success', 'Car added success');

            $this->redirectToRoute('user_car_home');
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

            $em->getRepository('AppBundle:UserCar')->edit($data);

            $this->addFlash('success', 'Car edited success');
        }

        return $this->render('@User/userCar/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * Delete action
     *
     * Delete user car item by id for current user
     *
     * @param $carId
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($carId)
    {
        $userId = $this->getUser()->getId();

        $em = $this->getDoctrine()->getManager();

        $userCar = $em->getRepository('AppBundle:UserCar')->getUserCar($carId, $userId);

        $em->remove($userCar);

        $em->flush();

        $this->addFlash('success', 'car delete success');

        return $this->redirectToRoute('user_car_home');
    }

    /**
     * Story action
     *
     * Show car story
     *
     * @param $carId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function storyAction($carId)
    {
        $em = $this->getDoctrine()->getManager();

        $serviceList = $em->getRepository('ServiceBundle:CarService')->getServiceListByCarId($carId);

        return $this->render('@User/userCar/story.html.twig', [
            'serviceList' => $serviceList
        ]);
    }
}
