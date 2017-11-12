<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 11.11.17
 * Time: 15:29
 */

namespace CarBundle\Strategy\Car;


use CarBundle\Entity\Fuel;
use Doctrine\ORM\EntityManager;

/**
 * Class StrategyCarFuel
 * @package CarBundle\Strategy\Car
 */
class StrategyCarFuel extends AbstractCarData
{
    /**
     * Get record data
     *
     * @param EntityManager $em
     * @param int|null $id
     * @return Fuel
     */
    public function getRecordData(EntityManager $em, int $id = null)
    {
        $record = $em->getRepository('CarBundle:Car')->getFuelData($id);

        if ($record) {
            return $record->getFuel();
        }

        return new Fuel();
    }
}