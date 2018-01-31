<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCar
 *
 * @ORM\Table(name="user_car")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserCarRepository")
 */
class UserCar
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
     * @ORM\Column(name="car_name", type="string")
     */
    protected $carName;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string")
     */
    protected $color;

    /**
     * @var integer
     *
     * @ORM\Column(name="years", type="integer")
     */
    protected $years;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Model", inversedBy="userCar")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    protected $model;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="userCar")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Engine", inversedBy="userCar")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $engine;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Transmission", inversedBy="userCar")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $transmission;

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
     * Set carName
     *
     * @param string $carName
     *
     * @return UserCar
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
     * Set color
     *
     * @param string $color
     *
     * @return UserCar
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set years
     *
     * @param integer $years
     *
     * @return UserCar
     */
    public function setYears($years)
    {
        $this->years = $years;

        return $this;
    }

    /**
     * Get years
     *
     * @return integer
     */
    public function getYears()
    {
        return $this->years;
    }

    /**
     * Set model
     *
     * @param \CarBundle\Entity\Model $model
     *
     * @return UserCar
     */
    public function setModel(\CarBundle\Entity\Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \CarBundle\Entity\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return UserCar
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set engine
     *
     * @param \CarBundle\Entity\Engine $engine
     *
     * @return UserCar
     */
    public function setEngine(\CarBundle\Entity\Engine $engine = null)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get engine
     *
     * @return \CarBundle\Entity\Engine
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Set transmission
     *
     * @param \CarBundle\Entity\Transmission $transmission
     *
     * @return UserCar
     */
    public function setTransmission(\CarBundle\Entity\Transmission $transmission = null)
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get transmission
     *
     * @return \CarBundle\Entity\Transmission
     */
    public function getTransmission()
    {
        return $this->transmission;
    }
}
