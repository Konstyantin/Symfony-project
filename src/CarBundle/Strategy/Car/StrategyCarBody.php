<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 11.11.17
 * Time: 15:08
 */

namespace CarBundle\Strategy\Car;

use CarBundle\Entity\Body;
use Doctrine\ORM\EntityManager;

/**
 * Class StrategyCarBody
 * @package CarBundle\Strategy\Car
 */
class StrategyCarBody extends AbstractCarData
{
    /**
     * Get record data
     *
     * @param EntityManager $em
     * @param int $id
     * @return Body
     */
    public function getRecordData(EntityManager $em, int $id)
    {
        $record = $em->getRepository('CarBundle:Car')->getBodyData($id);

        if ($record) {
            return $record->getBody();
        }

        return new Body();
    }
}