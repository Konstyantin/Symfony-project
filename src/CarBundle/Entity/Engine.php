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
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="num_cylinders", type="integer")
     */
    protected $num_cylinders;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="engine_volume", type="integer")
     */
    protected $engine_volume;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="car_drive", type="string", columnDefinition="ENUM('front', 'full', 'back')")
     */
    protected $car_drive;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="power", type="integer")
     */
    protected $power;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="r_hv", type="integer")
     */
    protected $r_hv;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="max_torque", type="integer")
     */
    protected $max_torque;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="compression", type="integer")
     */
    protected $compression;

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
     * Set numCylinders
     *
     * @param integer $numCylinders
     *
     * @return Engine
     */
    public function setNumCylinders($numCylinders)
    {
        $this->num_cylinders = $numCylinders;

        return $this;
    }

    /**
     * Get numCylinders
     *
     * @return integer
     */
    public function getNumCylinders()
    {
        return $this->num_cylinders;
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
        $this->engine_volume = $engineVolume;

        return $this;
    }

    /**
     * Get engineVolume
     *
     * @return integer
     */
    public function getEngineVolume()
    {
        return $this->engine_volume;
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
        $this->car_drive = $carDrive;

        return $this;
    }

    /**
     * Get carDrive
     *
     * @return string
     */
    public function getCarDrive()
    {
        return $this->car_drive;
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
        $this->r_hv = $rHv;

        return $this;
    }

    /**
     * Get rHv
     *
     * @return integer
     */
    public function getRHv()
    {
        return $this->r_hv;
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
        $this->max_torque = $maxTorque;

        return $this;
    }

    /**
     * Get maxTorque
     *
     * @return integer
     */
    public function getMaxTorque()
    {
        return $this->max_torque;
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
}
