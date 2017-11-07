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
     * @Assert\NotNull()
     * @ORM\Column(name="city", type="integer")
     */
    protected $city;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(name="country", type="integer")
     */
    protected $country;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(name="combined", type="integer")
     */
    protected $combined;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(name="emission", type="integer")
     */
    protected $emission;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Car", mappedBy="fuel")
     */
    protected $car;

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
}
