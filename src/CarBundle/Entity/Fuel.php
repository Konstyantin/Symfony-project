<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Fuel
 *
 * @ORM\Table(name="fuel")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\FuelRepository")
 */
class Fuel
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
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="city", type="integer")
     */
    protected $city;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="country", type="integer")
     */
    protected $country;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="combined", type="integer")
     */
    protected $combined;

    /**
     * @var integer
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="emission", type="integer")
     */
    protected $emission;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Car", inversedBy="fuel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id", nullable=true)
     */
    protected $car;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Configuration", inversedBy="fuel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="configuration_id", referencedColumnName="id")
     */
    protected $configuration;

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
     * Set city
     *
     * @param integer $city
     *
     * @return Fuel
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return integer
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param integer $country
     *
     * @return Fuel
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return integer
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set combined
     *
     * @param integer $combined
     *
     * @return Fuel
     */
    public function setCombined($combined)
    {
        $this->combined = $combined;

        return $this;
    }

    /**
     * Get combined
     *
     * @return integer
     */
    public function getCombined()
    {
        return $this->combined;
    }

    /**
     * Set emission
     *
     * @param integer $emission
     *
     * @return Fuel
     */
    public function setEmission($emission)
    {
        $this->emission = $emission;

        return $this;
    }

    /**
     * Get emission
     *
     * @return integer
     */
    public function getEmission()
    {
        return $this->emission;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->car = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add car
     *
     * @param \CarBundle\Entity\Car $car
     *
     * @return Fuel
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
     * Set car
     *
     * @param \CarBundle\Entity\Car $car
     *
     * @return Fuel
     */
    public function setCar(\CarBundle\Entity\Car $car = null)
    {
        $this->car = $car;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->id;
    }

    /**
     * Set configuration
     *
     * @param \CarBundle\Entity\Configuration $configuration
     *
     * @return Fuel
     */
    public function setConfiguration(\CarBundle\Entity\Configuration $configuration = null)
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * Get configuration
     *
     * @return \CarBundle\Entity\Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }
}
