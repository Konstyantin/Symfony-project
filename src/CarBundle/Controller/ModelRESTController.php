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
 * Class ModelRESTController
 * @package CarBundle\Controller
 *
 * @RouteResource("model")
 */
class ModelRESTController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Get a collection of Models by model name
     *
     * @return array
     *
     * @ApiDoc(
     *     output="CarBundle\Entity\Model",
     *     statusCodes={
     *          200 = "Return when success",
     *          404 = "Return when not found"
     *     },
     *     description="Get model list by passed model name param",
     * )
     * @param string $name model name
     */
    public function getAction(string $name)
    {
        $em = $this->getDoctrine()->getManager();

        $modelList = $em->getRepository('CarBundle:Model')->searchModelByName($name);

        return $modelList;
    }

    /**
     * Get a collection of Posts
     *
     * @return array
     *
     * @ApiDoc(
     *     output="CarBundle\Entity\Model",
     *     statusCodes={
     *          200 = "Return when success",
     *          404 = "Return when not found"
     *     },
     *     description="Get model list collection"
     * )
     */
    public function cgetAction()
    {
        $em = $this->getDoctrine()->getManager();

        return $em->getRepository('CarBundle:Model')->searchModel();
    }
}