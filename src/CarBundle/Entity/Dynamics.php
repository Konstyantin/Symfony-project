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
     *
     * @ORM\Column(name="acceleration", type="integer")
     */
    protected $acceleration;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="speed", type="integer")
     */
    protected $speed;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Configuration", inversedBy="dynamics")
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
     * Set configuration
     *
     * @param \CarBundle\Entity\Configuration $configuration
     *
     * @return Dynamics
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
