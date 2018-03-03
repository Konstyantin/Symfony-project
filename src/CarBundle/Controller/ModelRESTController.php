<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 03.03.18
 * Time: 21:40
 */

namespace CarBundle\Controller;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * Get a collection of Posts
     *
     * @return array
     *
     * @ApiDoc(
     *     output="PostBundle\Entity\Post",
     *     statusCodes={
     *          200 = "Return when success",
     *          404 = "Return when not found"
     *     }
     * )
     */
    public function cgetAction()
    {
//        $em = $this->getDoctrine()->getManager();
//
//        return $em->getRepository('CarBundle:Model')->getModelsList();

        return ['test' => 'test'];
    }
}