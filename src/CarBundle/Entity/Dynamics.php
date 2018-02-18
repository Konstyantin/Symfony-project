<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CarBundle\Entity\Configuration;
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
     * @ORM\Column(name="acceleration", type="integer", length=11)
     */
    protected $acceleration;

    /**
     * @var integer
     *
     * @ORM\Column(name="speed", type="integer", length=11)
     */
    protected $speed;

    /**
     * @ORM\OneToOne(targetEntity="CarBundle\Entity\Configuration", mappedBy="dynamics", cascade={"persist", "remove"})
     */
    protected $configuration;

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
     * Set configuration
     *
     * @param Configuration $configuration
     *
     * @return Dynamics
     */
    public function setConfiguration(Configuration $configuration = null)
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * Get configuration
     *
     * @return Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Use entity as string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
    }
}
