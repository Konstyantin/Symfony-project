<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 11.11.17
 * Time: 15:27
 */

namespace CarBundle\Strategy\Car;


use CarBundle\Entity\Dynamics;
use Doctrine\ORM\EntityManager;

/**
 * Class StrategyCarDynamics
 * @package CarBundle\Strategy\Car
 */
class StrategyCarDynamics extends AbstractCarData
{
    /**
     * Get record data
     *
     * @param EntityManager $em
     * @param int $id
     * @return Dynamics
     */
    public function getRecordData(EntityManager $em, int $id)
    {
        $record = $em->getRepository('CarBundle:Car')->getDynamicsData($id);

        if ($record) {
            return $record->getDynamics();
        }

        return new Dynamics();
    }
}