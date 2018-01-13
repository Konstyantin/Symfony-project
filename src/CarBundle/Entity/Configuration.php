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
     * @ORM\ManyToMany(targetEntity="CarBundle\Entity\Engine", inversedBy="car", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="configure_engines")
     */
    protected $engine;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->body = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fuel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dynamics = new \Doctrine\Common\Collections\ArrayCollection();
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
}
