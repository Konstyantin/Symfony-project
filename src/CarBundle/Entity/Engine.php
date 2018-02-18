<?php

namespace CarBundle\Entity;

use AppBundle\Entity\UserCar;
use Doctrine\ORM\Mapping as ORM;
use CarBundle\Entity\Configuration;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Engine
 *
 * @ORM\Table(name="engine")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\EngineRepository")
 */
class Engine
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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    protected $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_cylinders", type="integer", length=11, nullable=false)
     */
    protected $numCylinders;

    /**
     * @var integer
     *
     * @ORM\Column(name="engine_volume", type="integer", length=11, nullable=false)
     */
    protected $engineVolume;

    /**
     * @var integer
     *
     * @ORM\Column(name="power", type="integer", length=11, nullable=false)
     */
    protected $power;

    /**
     * @var integer
     *
     * @ORM\Column(name="r_hv", type="integer", length=11, nullable=false)
     */
    protected $rHv;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_torque", type="integer", length=11, nullable=false)
     */
    protected $maxTorque;

    /**
     * @var integer
     *
     * @ORM\Column(name="compression", type="integer", length=11, nullable=false)
     */
    protected $compression;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", length=11, nullable=false)
     */
    protected $price;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Configuration", mappedBy="engine", cascade={"persist", "remove"})
     */
    protected $configuration;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserCar", mappedBy="engine", cascade={"persist", "remove"})
     */
    protected $userCar;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->configuration = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Engine
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set numCylinders
     *
     * @param integer $numCylinders
     *
     * @return Engine
     */
    public function setNumCylinders($numCylinders)
    {
        $this->numCylinders = $numCylinders;

        return $this;
    }

    /**
     * Get numCylinders
     *
     * @return integer
     */
    public function getNumCylinders()
    {
        return $this->numCylinders;
    }

    /**
     * Set engineVolume
     *
     * @param integer $engineVolume
     *
     * @return Engine
     */
    public function setEngineVolume($engineVolume)
    {
        $this->engineVolume = $engineVolume;

        return $this;
    }

    /**
     * Get engineVolume
     *
     * @return integer
     */
    public function getEngineVolume()
    {
        return $this->engineVolume;
    }

    /**
     * Set power
     *
     * @param integer $power
     *
     * @return Engine
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power
     *
     * @return integer
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set rHv
     *
     * @param integer $rHv
     *
     * @return Engine
     */
    public function setRHv($rHv)
    {
        $this->rHv = $rHv;

        return $this;
    }

    /**
     * Get rHv
     *
     * @return integer
     */
    public function getRHv()
    {
        return $this->rHv;
    }

    /**
     * Set maxTorque
     *
     * @param integer $maxTorque
     *
     * @return Engine
     */
    public function setMaxTorque($maxTorque)
    {
        $this->maxTorque = $maxTorque;

        return $this;
    }

    /**
     * Get maxTorque
     *
     * @return integer
     */
    public function getMaxTorque()
    {
        return $this->maxTorque;
    }

    /**
     * Set compression
     *
     * @param integer $compression
     *
     * @return Engine
     */
    public function setCompression($compression)
    {
        $this->compression = $compression;

        return $this;
    }

    /**
     * Get compression
     *
     * @return integer
     */
    public function getCompression()
    {
        return $this->compression;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Engine
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
     * Add configuration
     *
     * @param Configuration $configuration
     *
     * @return Engine
     */
    public function addConfiguration(Configuration $configuration)
    {
        $this->configuration[] = $configuration;

        return $this;
    }

    /**
     * Remove configuration
     *
     * @param Configuration $configuration
     */
    public function removeConfiguration(Configuration $configuration)
    {
        $this->configuration->removeElement($configuration);
    }

    /**
     * Get configuration
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Add userCar
     *
     * @param UserCar $userCar
     *
     * @return Engine
     */
    public function addUserCar(UserCar $userCar)
    {
        $this->userCar[] = $userCar;

        return $this;
    }

    /**
     * Remove userCar
     *
     * @param UserCar $userCar
     */
    public function removeUserCar(UserCar $userCar)
    {
        $this->userCar->removeElement($userCar);
    }

    /**
     * Get userCar
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserCar()
    {
        return $this->userCar;
    }

    /**
     * Call magic method __toString
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }
}
