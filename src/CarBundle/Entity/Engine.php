<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="num_cylinders", type="integer")
     */
    protected $numCylinders;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="engine_volume", type="integer")
     */
    protected $engineVolume;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="car_drive", type="string", columnDefinition="ENUM('front', 'full', 'back')")
     */
    protected $carDrive;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="power", type="integer")
     */
    protected $power;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="r_hv", type="integer")
     */
    protected $rHv;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="max_torque", type="integer")
     */
    protected $maxTorque;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="compression", type="integer")
     */
    protected $compression;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="price", type="integer")
     */
    protected $price;

    /**
     * @ORM\ManyToMany(targetEntity="CarBundle\Entity\Configuration", mappedBy="engine")
     */
    protected $configuration;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->configuration = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set carDrive
     *
     * @param string $carDrive
     *
     * @return Engine
     */
    public function setCarDrive($carDrive)
    {
        $this->carDrive = $carDrive;

        return $this;
    }

    /**
     * Get carDrive
     *
     * @return string
     */
    public function getCarDrive()
    {
        return $this->carDrive;
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
     * @param \CarBundle\Entity\Configuration $configuration
     *
     * @return Engine
     */
    public function addConfiguration(\CarBundle\Entity\Configuration $configuration)
    {
        $this->configuration[] = $configuration;

        return $this;
    }

    /**
     * Remove configuration
     *
     * @param \CarBundle\Entity\Configuration $configuration
     */
    public function removeConfiguration(\CarBundle\Entity\Configuration $configuration)
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
     * Call magic method __toString
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }
}
