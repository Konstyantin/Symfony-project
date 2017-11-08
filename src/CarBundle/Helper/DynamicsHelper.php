<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 02.11.17
 * Time: 23:56
 */
namespace CarBundle\Helper;

use CarBundle\Entity\Dynamics;
use Doctrine\ORM\EntityManager;

/**
 * Class DynamicsHelper
 * @package CarBundle\Helper
 */
class DynamicsHelper
{
    /**
     * @var $acceleration integer
     */
    private $acceleration;

    /**
     * @var $speed integer
     */
    private $speed;

    /**
     * Create dynamics record
     *
     * Create dynamics record by array data and return create dynamics record
     *
     * @param EntityManager $em
     * @param array $data
     * @return Dynamics
     */
    public function createDynamicsRecord(EntityManager $em, array $data)
    {
        $this->defineDynamicsData($data);

        $dynamics = new Dynamics();

        $dynamics->setAcceleration($this->acceleration);
        $dynamics->setSpeed($this->speed);
        $em->persist($dynamics);
        $em->flush();

        return $dynamics;
    }

    /**
     * Update dynamics record
     *
     * Update dynamics record data for sender dynamics
     *
     * @param EntityManager $em
     * @param $data
     * @param $dynamics
     */
    public function updateDynamicsRecord(EntityManager $em, $data, Dynamics $dynamics)
    {
        $this->defineBodyData($data);

        $dynamics->setAcceleration($this->acceleration);
        $dynamics->setSpeed($this->speed);
        $em->persist($dynamics);
        $em->flush();
    }

    /**
     * Define dynamics data
     *
     * Define dynamics data as helper property form sender data array
     *
     * @param array $data
     */
    protected function defineDynamicsData(array $data)
    {
        $this->acceleration = $data['acceleration'];
        $this->speed = $data['speed'];
    }
}