<?php

namespace CarBundle\Entity;

use AppBundle\Entity\UserCar;
use Doctrine\ORM\Mapping as ORM;
use CarBundle\Entity\Configuration;
use CarBundle\Entity\TransmissionType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Transmission
 *
 * @ORM\Table(name="transmission")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\TransmissionRepository")
 */
class Transmission
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
     * @ORM\Column(name="steps", type="integer")
     */
    protected $steps;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", length=11, nullable=false)
     */
    protected $price;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\TransmissionType", inversedBy="transmission", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    protected $type;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Configuration", mappedBy="transmission", cascade={"persist", "remove"})
     */
    protected $configuration;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserCar", mappedBy="transmission", cascade={"persist", "remove"})
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
     * @return Transmission
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
     * Set steps
     *
     * @param integer $steps
     *
     * @return Transmission
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;

        return $this;
    }

    /**
     * Get steps
     *
     * @return integer
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Transmission
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
     * Set type
     *
     * @param TransmissionType $type
     *
     * @return Transmission
     */
    public function setType(TransmissionType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return TransmissionType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add configuration
     *
     * @param Configuration $configuration
     *
     * @return Transmission
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
     * @return Transmission
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
     * Call magic __toString method
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }
}
