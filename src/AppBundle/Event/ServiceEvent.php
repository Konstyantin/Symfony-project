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
use UserBundle\Entity\User;

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
     * @var User $user
     */
    protected $user;

    /**
     * ServiceEvent constructor.
     * @param CarService $carService
     */
    public function __construct(CarService $carService, $user = null)
    {
        $this->carService = $carService;

        $this->user = $user;
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

    /**
     * Get User
     *
     * @return null|User
     */
    public function getUser()
    {
        return $this->user;
    }
}