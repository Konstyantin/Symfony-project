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
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Dynamics", mappedBy="configuration", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $dynamics;

    /**
     * @ORM\ManyToMany(targetEntity="CarBundle\Entity\Engine", inversedBy="configuration", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="configure_engines")
     */
    protected $engine;

    /**
     * @ORM\ManyToMany(targetEntity="CarBundle\Entity\Transmission", inversedBy="configuration")
     * @ORM\JoinTable(name="configuration_transmission")
     */
    protected $transmission;

    /**
     * @ORM\ManyToMany(targetEntity="CarBundle\Entity\Car", mappedBy="configurations")
     */
    protected $car;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->body = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fuel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dynamics = new \Doctrine\Common\Collections\ArrayCollection();
        $this->engine = new \Doctrine\Common\Collections\ArrayCollection();
        $this->transmission = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add dynamic
     *
     * @param \CarBundle\Entity\Dynamics $dynamic
     *
     * @return Configuration
     */
    public function addDynamic(\CarBundle\Entity\Dynamics $dynamic)
    {
        $this->dynamics[] = $dynamic;

        return $this;
    }

    /**
     * Remove dynamic
     *
     * @param \CarBundle\Entity\Dynamics $dynamic
     */
    public function removeDynamic(\CarBundle\Entity\Dynamics $dynamic)
    {
        $this->dynamics->removeElement($dynamic);
    }

    /**
     * Get dynamics
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDynamics()
    {
        return $this->dynamics;
    }

    /**
     * Add engine
     *
     * @param \CarBundle\Entity\Engine $engine
     *
     * @return Configuration
     */
    public function addEngine(\CarBundle\Entity\Engine $engine)
    {
        $this->engine[] = $engine;

        return $this;
    }

    /**
     * Remove engine
     *
     * @param \CarBundle\Entity\Engine $engine
     */
    public function removeEngine(\CarBundle\Entity\Engine $engine)
    {
        $this->engine->removeElement($engine);
    }

    /**
     * Get engine
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Add transmission
     *
     * @param \CarBundle\Entity\Transmission $transmission
     *
     * @return Configuration
     */
    public function addTransmission(\CarBundle\Entity\Transmission $transmission)
    {
        $this->transmission[] = $transmission;

        return $this;
    }

    /**
     * Remove transmission
     *
     * @param \CarBundle\Entity\Transmission $transmission
     */
    public function removeTransmission(\CarBundle\Entity\Transmission $transmission)
    {
        $this->transmission->removeElement($transmission);
    }

    /**
     * Get transmission
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransmission()
    {
        return $this->transmission;
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
