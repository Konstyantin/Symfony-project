<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 01.01.18
 * Time: 20:32
 */
namespace CarBundle\Services;

use Doctrine\ORM\EntityManager;

/**
 * Class ModelManagement
 * @package CarBundle\Services
 */
class ModelManagement
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * ModelManagement constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Get model list
     *
     * @return mixed
     */
    public function getList() {
        return $this->em->getRepository('CarBundle:Model')->getModelsList();
    }
}