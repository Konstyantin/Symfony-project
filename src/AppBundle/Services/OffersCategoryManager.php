<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 23.01.18
 * Time: 22:23
 */
namespace AppBundle\Services;

use Doctrine\ORM\EntityManager;

/**
 * Class OffersCategoryManager
 * @package AppBundle\Services
 */
class OffersCategoryManager
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
     * Get list
     *
     * Get list offers category
     *
     * @return array
     */
    public function getList()
    {
        return $this->em->getRepository('AppBundle:OffersCategory')->getCategoryList();
    }
}