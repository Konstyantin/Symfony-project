<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 07.02.18
 * Time: 21:25
 */
namespace AppBundle\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class ServiceEvent
 * @package AppBundle\Event
 */
class ServiceEvent extends Event
{
    /**
     * @return string
     */
    public function getService()
    {
        return 'service';
    }
}