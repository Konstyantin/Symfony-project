<?php

namespace CarBundle\Entity;

use CarBundle\Entity\Dynamics;
use CarBundle\Entity\Engine;
use CarBundle\Entity\Transmission;
use CarBundle\Entity\Car;
use CarBundle\Entity\Fuel;
use CarBundle\Entity\Body;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Configuration
 *
 * @ORM\Table(name="configuration")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\ConfigurationRepository")
 */
class Configuration
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
     * @ORM\Column(name="car_name", type="string", length=45)
     */
    protected $carName;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", length=11)
     */
    protected $price;

    /**
     * @ORM\OneToOne(targetEntity="CarBundle\Entity\Body", inversedBy="configuration", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="body_id", referencedColumnName="id")
     */
    protected $body;

    /**
     * @ORM\OneToOne(targetEntity="CarBundle\Entity\Fuel", inversedBy="configuration", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="fuel_id", referencedColumnName="id")
     */
    protected $fuel;

    /**
     * @ORM\OneToOne(targetEntity="CarBundle\Entity\Dynamics", inversedBy="configuration", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="dynamics_id", referencedColumnName="id")
     */
    protected $dynamics;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Engine", inversedBy="configuration", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="engine_id")
     */
    protected $engine;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Transmission", inversedBy="configuration", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="transmission_id", referencedColumnName="id")
     */
    protected $transmission;

    /**
     * @ORM\ManyToMany(targetEntity="CarBundle\Entity\Car", mappedBy="configurations", cascade={"persist", "remove"})
     */
    protected $car;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->car = new ArrayCollection();
    }

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
     * Set carName
     *
     * @param string $carName
     *
     * @return Configuration
     */
    public function setCarName($carName)
    {
        $this->carName = $carName;

        return $this;
    }

    /**
     * Get carName
     *
     * @return string
     */
    public function getCarName()
    {
        return $this->carName;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Configuration
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set dynamics
     *
     * @param Dynamics $dynamics
     *
     * @return Configuration
     */
    public function setDynamics(Dynamics $dynamics = null)
    {
        $this->dynamics = $dynamics;

        return $this;
    }

    /**
     * Get dynamics
     *
     * @return Dynamics
     */
    public function getDynamics()
    {
        return $this->dynamics;
    }

    /**
     * Set engine
     *
     * @param Engine $engine
     *
     * @return Configuration
     */
    public function setEngine(Engine $engine = null)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get engine
     *
     * @return Engine
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Set transmission
     *
     * @param Transmission $transmission
     *
     * @return Configuration
     */
    public function setTransmission(Transmission $transmission = null)
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get transmission
     *
     * @return Transmission
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Add car
     *
     * @param Car $car
     *
     * @return Configuration
     */
    public function addCar(Car $car)
    {
        $this->car[] = $car;

        return $this;
    }

    /**
     * Remove car
     *
     * @param Car $car
     */
    public function removeCar(Car $car)
    {
        $this->car->removeElement($car);
    }

    /**
     * Get car
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set fuel
     *
     * @param Fuel $fuel
     *
     * @return Configuration
     */
    public function setFuel(Fuel $fuel = null)
    {
        $this->fuel = $fuel;

        return $this;
    }

    /**
     * Get fuel
     *
     * @return Fuel
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * Set body
     *
     * @param Body $body
     *
     * @return Configuration
     */
    public function setBody(Body $body = null)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return Body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Use when call use entity as string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getCarName();
    }

}
