<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 11.11.17
 * Time: 13:09
 */
namespace CarBundle\Strategy\Car;

use Doctrine\ORM\EntityManager;

/**
 * Class CarDataInterface
 * @package CarBundle\Strategy\Car
 */
abstract class AbstractCarData
{
    /**
     * Get record data
     *
     * @param EntityManager $em
     * @param int $id
     * @return mixed
     */
    abstract public function getRecordData(EntityManager $em, int $id);
}