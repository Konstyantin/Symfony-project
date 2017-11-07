<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Body
 *
 * @ORM\Table(name="body")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\BodyRepository")
 */
class Body
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
     * @var int
     *
     * @Assert\NotNull()
     * @ORM\Column(name="length", type="integer")
     */
    protected $length;

    /**
     * @var int
     *
     * @Assert\NotNull()
     * @ORM\Column(name="width", type="integer")
     */
    protected $width;

    /**
     * @var int
     *
     * @Assert\NotNull()
     * @ORM\Column(name="height", type="integer")
     */
    protected $height;

    /**
     * @var int
     *
     * @Assert\NotNull()
     * @ORM\Column(name="wheel_base", type="integer")
     */
    protected $wheel_base;

    /**
     * @var int
     *
     * @Assert\NotNull()
     * @ORM\Column(name="aerodynamic_coefficient", type="integer")
     */
    protected $aerodynamic_coefficient;

    /**
     * @var int
     *
     * @Assert\NotNull()
     * @ORM\Column(name="weight", type="integer")
     */
    protected $weight;

    /**
     * @ORM\OneToOne(targetEntity="CarBundle\Entity\Car", mappedBy="body")
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
     * Set length
     *
     * @param integer $length
     *
     * @return Body
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set width
     *
     * @param integer $width
     *
     * @return Body
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return Body
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set wheelBase
     *
     * @param integer $wheelBase
     *
     * @return Body
     */
    public function setWheelBase($wheelBase)
    {
        $this->wheel_base = $wheelBase;

        return $this;
    }

    /**
     * Get wheelBase
     *
     * @return integer
     */
    public function getWheelBase()
    {
        return $this->wheel_base;
    }

    /**
     * Set aerodynamicCoefficient
     *
     * @param integer $aerodynamicCoefficient
     *
     * @return Body
     */
    public function setAerodynamicCoefficient($aerodynamicCoefficient)
    {
        $this->aerodynamic_coefficient = $aerodynamicCoefficient;

        return $this;
    }

    /**
     * Get aerodynamicCoefficient
     *
     * @return integer
     */
    public function getAerodynamicCoefficient()
    {
        return $this->aerodynamic_coefficient;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Body
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set car
     *
     * @param \CarBundle\Entity\Car $car
     *
     * @return Body
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
}
