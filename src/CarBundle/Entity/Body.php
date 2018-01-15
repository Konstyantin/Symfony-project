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
     * @Assert\NotBlank()
     * @ORM\Column(name="length", type="integer")
     */
    protected $length;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="width", type="integer")
     */
    protected $width;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="height", type="integer")
     */
    protected $height;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="wheel_base", type="integer")
     */
    protected $wheelBase;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="aerodynamic_coefficient", type="integer")
     */
    protected $aerodynamicCoefficient;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="weight", type="integer")
     */
    protected $weight;

    /**
     * @ORM\OneToOne(targetEntity="CarBundle\Entity\Configuration", mappedBy="body")
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
        $this->wheelBase = $wheelBase;

        return $this;
    }

    /**
     * Get wheelBase
     *
     * @return integer
     */
    public function getWheelBase()
    {
        return $this->wheelBase;
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
        $this->aerodynamicCoefficient = $aerodynamicCoefficient;

        return $this;
    }

    /**
     * Get aerodynamicCoefficient
     *
     * @return integer
     */
    public function getAerodynamicCoefficient()
    {
        return $this->aerodynamicCoefficient;
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
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
    }

    /**
     * Set configuration
     *
     * @param \CarBundle\Entity\Configuration $configuration
     *
     * @return Body
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
