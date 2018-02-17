<?php

namespace ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ServiceBundle\Entity\CarService;

/**
 * ServiceAction
 *
 * @ORM\Table(name="service_action")
 * @ORM\Entity(repositoryClass="ServiceBundle\Repository\ServiceActionRepository")
 */
class ServiceAction
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string")
     */
    protected $action;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="ServiceBundle\Entity\CarService", inversedBy="serviceAction", cascade={"persist"})
     * @ORM\JoinColumn(name="car_service_id", referencedColumnName="id", nullable=true)
     */
    protected $carService;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return ServiceAction
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return ServiceAction
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set carService
     *
     * @param CarService $carService
     *
     * @return ServiceAction
     */
    public function setCarService(CarService $carService = null)
    {
        $this->carService = $carService;

        return $this;
    }

    /**
     * Get carService
     *
     * @return CarService
     */
    public function getCarService()
    {
        return $this->carService;
    }

    /**
     * Handle as string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
    }
}
