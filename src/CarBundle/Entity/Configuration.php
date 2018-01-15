<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="car_name", type="string")
     */
    protected $carName;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="price", type="integer")
     */
    protected $price;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Body", mappedBy="configuration", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $body;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Fuel", mappedBy="configuration", cascade={"persist", "remove"}, orphanRemoval=true)
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
     * @ORM\ManyToMany(targetEntity="CarBundle\Entity\Car", mappedBy="configurations")
     */
    protected $car;


    /**
     * Use when call use entity as string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getCarName();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->body = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fuel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->car = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add body
     *
     * @param \CarBundle\Entity\Body $body
     *
     * @return Configuration
     */
    public function addBody(\CarBundle\Entity\Body $body)
    {
        $this->body[] = $body;

        return $this;
    }

    /**
     * Remove body
     *
     * @param \CarBundle\Entity\Body $body
     */
    public function removeBody(\CarBundle\Entity\Body $body)
    {
        $this->body->removeElement($body);
    }

    /**
     * Get body
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Add fuel
     *
     * @param \CarBundle\Entity\Fuel $fuel
     *
     * @return Configuration
     */
    public function addFuel(\CarBundle\Entity\Fuel $fuel)
    {
        $this->fuel[] = $fuel;

        return $this;
    }

    /**
     * Remove fuel
     *
     * @param \CarBundle\Entity\Fuel $fuel
     */
    public function removeFuel(\CarBundle\Entity\Fuel $fuel)
    {
        $this->fuel->removeElement($fuel);
    }

    /**
     * Get fuel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * Set dynamics
     *
     * @param \CarBundle\Entity\Dynamics $dynamics
     *
     * @return Configuration
     */
    public function setDynamics(\CarBundle\Entity\Dynamics $dynamics = null)
    {
        $this->dynamics = $dynamics;

        return $this;
    }

    /**
     * Get dynamics
     *
     * @return \CarBundle\Entity\Dynamics
     */
    public function getDynamics()
    {
        return $this->dynamics;
    }

    /**
     * Set engine
     *
     * @param \CarBundle\Entity\Engine $engine
     *
     * @return Configuration
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
     * @return Configuration
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
     * Add car
     *
     * @param \CarBundle\Entity\Car $car
     *
     * @return Configuration
     */
    public function addCar(\CarBundle\Entity\Car $car)
    {
        $this->car[] = $car;

        return $this;
    }

    /**
     * Remove car
     *
     * @param \CarBundle\Entity\Car $car
     */
    public function removeCar(\CarBundle\Entity\Car $car)
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
}
