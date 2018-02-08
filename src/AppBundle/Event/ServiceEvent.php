<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 07.02.18
 * Time: 21:25
 */
namespace AppBundle\Event;

use AppBundle\Entity\CarService;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ServiceEvent
 * @package AppBundle\Event
 */
class ServiceEvent extends Event
{
    /**
     * @var CarService $carService
     */
    protected $carService;

    /**
     * ServiceEvent constructor.
     * @param CarService $carService
     */
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * Get service
     *
     * @return CarService
     */
    public function getService()
    {
        return $this->carService;
    }
}