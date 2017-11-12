<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 11.11.17
 * Time: 15:35
 */

namespace CarBundle\Strategy\Car;


use Doctrine\ORM\EntityManager;

/**
 * Class StrategyCarData
 * @package CarBundle\Strategy\Car
 */
class StrategyCarData
{
    const BODY = 'Body';

    const FUEL = 'Fuel';

    const DYNAMICS = 'Dynamics';

    /**
     * @var $strategy
     */
    private $strategy;

    /**
     * @var EntityManager $em
     */
    private $em;

    /**
     * @var int $id car id
     */
    private $id;

    /**
     * StrategyCarData constructor.
     * @param EntityManager $em
     * @param int|null $id
     */
    public function __construct(EntityManager $em, int $id = null)
    {
        $this->em = $em;
        $this->id = $id;
    }

    /**
     * Get data
     *
     * @param string $dataType
     * @return mixed
     */
    public function getRecord(string $dataType)
    {
        switch ($dataType) {
            case self::BODY:
                $this->strategy = new StrategyCarBody();
            break;
            case self::FUEL:
                $this->strategy = new StrategyCarFuel();
            break;
            case self::DYNAMICS:
                $this->strategy = new StrategyCarDynamics();
            break;
        }

        return $this->getStrategyData();
    }

    /**
     * Get record data
     *
     * @return mixed
     */
    private function getStrategyData()
    {
        return $this->strategy->getRecordData($this->em, $this->id);
    }
}