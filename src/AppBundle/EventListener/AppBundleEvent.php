<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 07.02.18
 * Time: 21:06
 */
namespace AppBundle\EventListener;

/**
 * Class AppBundleEvent
 * @package AppBundle\EventListener
 */
final class AppBundleEvent
{
    /**
     * The SERVICE_REGISTER occurs when user make registration to service
     */
    const SERVICE_REGISTER = 'service.register';
}