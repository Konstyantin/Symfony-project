<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServiceAction
 *
 * @ORM\Table(name="service_action")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceActionRepository")
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CarService", inversedBy="serviceAction", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="car_service_id", referencedColumnName="id")
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
     * @param \AppBundle\Entity\CarService $carService
     *
     * @return ServiceAction
     */
    public function setCarService(\AppBundle\Entity\CarService $carService = null)
    {
        $this->carService = $carService;

        return $this;
    }

    /**
     * Get carService
     *
     * @return \AppBundle\Entity\CarService
     */
    public function getCarService()
    {
        return $this->carService;
    }
}
