<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 03.03.18
 * Time: 21:40
 */

namespace CarBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * Class CarRESTController
 * @package CarBundle\Controller
 *
 * @RouteResource("car")
 */
class CarRESTController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Get a collection of Models by model name
     *
     * @return array
     *
     * @ApiDoc(
     *     output="CarBundle\Entity\Car",
     *     statusCodes={
     *          200 = "Return when success",
     *          404 = "Return when not found"
     *     },
     *     description="Get car list by passed car name param",
     * )
     * @param string $name model name
     */
    public function getAction(string $name)
    {
        $em = $this->getDoctrine()->getManager();

        $modelList = $em->getRepository('CarBundle:Car')->searchCar($name);

        return $modelList;
    }
}