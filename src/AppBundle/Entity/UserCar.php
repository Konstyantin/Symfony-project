<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserCar
 *
 * @ORM\Table(name="user_car")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserCarRepository")
 */
class UserCar
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
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Car", inversedBy="userCar", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     */
    protected $car;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string")
     */
    protected $color;

    /**
     * @var integer
     * @ORM\Column(name="created_at", type="integer")
     */
    protected $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Model", inversedBy="userCar", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    protected $model;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="userCar", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Engine", inversedBy="userCar", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="engine_id", referencedColumnName="id")
     */
    protected $engine;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Transmission", inversedBy="userCar", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="transmission_id", referencedColumnName="id")
     */
    protected $transmission;

    /**
     * @ORM\OneToMany(targetEntity="ServiceBundle\Entity\CarService", mappedBy="userCar", cascade={"persist", "remove"})
     */
    protected $carService;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set color
     *
     * @param string $color
     *
     * @return UserCar
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return UserCar
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return integer
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set model
     *
     * @param \CarBundle\Entity\Model $model
     *
     * @return UserCar
     */
    public function setModel(\CarBundle\Entity\Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \CarBundle\Entity\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return UserCar
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set engine
     *
     * @param \CarBundle\Entity\Engine $engine
     *
     * @return UserCar
     */
    public function setEngine(\CarBundle\Entity\Engine $engine = null)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get engine
     *
     * @return \CarBundle\Entity\Engine
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Set transmission
     *
     * @param \CarBundle\Entity\Transmission $transmission
     *
     * @return UserCar
     */
    public function setTransmission(\CarBundle\Entity\Transmission $transmission = null)
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get transmission
     *
     * @return \CarBundle\Entity\Transmission
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Set car
     *
     * @param \CarBundle\Entity\Car $car
     *
     * @return UserCar
     */
    public function setCar(\CarBundle\Entity\Car $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \CarBundle\Entity\Car
     */
    public function getCar()
    {
        return $this->car;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->carService = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add carService
     *
     * @param \ServiceBundle\Entity\CarService $carService
     *
     * @return UserCar
     */
    public function addCarService(\ServiceBundle\Entity\CarService $carService)
    {
        $this->carService[] = $carService;

        return $this;
    }

    /**
     * Remove carService
     *
     * @param \ServiceBundle\Entity\CarService $carService
     */
    public function removeCarService(\ServiceBundle\Entity\CarService $carService)
    {
        $this->carService->removeElement($carService);
    }

    /**
     * Get carService
     *
     * @return \Doctrine\Common\Collections\Collection
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
