<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 07.02.18
 * Time: 21:08
 */

namespace AppBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ServiceListener
 * @package AppBundle\EventListener
 */
class ServiceListener implements EventSubscriberInterface
{
    /**
     * @var ContainerInterface $serviceContainer
     */
    protected $serviceContainer;

    /**
     * ServiceListener constructor.
     * @param ContainerInterface $serviceContainer
     */
    public function __construct(ContainerInterface $serviceContainer)
    {
        $this->serviceContainer = $serviceContainer;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            AppBundleEvent::SERVICE_REGISTER => 'onServiceRegister'
        ];
    }

    /**
     * @return string
     */
    public function onServiceRegister()
    {
        return 'on service register';
    }
}