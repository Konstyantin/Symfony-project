<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Dynamics
 *
 * @ORM\Table(name="dynamics")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\DynamicsRepository")
 */
class Dynamics
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
     * @ORM\Column(name="acceleration", type="integer")
     */
    protected $acceleration;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @ORM\Column(name="speed", type="integer")
     */
    protected $speed;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Car", mappedBy="dynamics")
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
     * Set acceleration
     *
     * @param integer $acceleration
     *
     * @return Dynamics
     */
    public function setAcceleration($acceleration)
    {
        $this->acceleration = $acceleration;

        return $this;
    }

    /**
     * Get acceleration
     *
     * @return integer
     */
    public function getAcceleration()
    {
        return $this->acceleration;
    }

    /**
     * Set speed
     *
     * @param integer $speed
     *
     * @return Dynamics
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get speed
     *
     * @return integer
     */
    public function getSpeed()
    {
        return $this->speed;
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
     * @return Dynamics
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
