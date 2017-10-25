<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
     * @Assert\NotBlank()
     * @Assert\Length(max="45")
     * @ORM\Column(name="name", type="string", length=45)
     */
    protected $name;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="2")
     * @ORM\Column(name="steps", type="integer")
     */
    protected $steps;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="price", type="integer")
     */
    protected $price;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\TransmissionType", inversedBy="transmission")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    protected $type;

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
     * Set type
     *
     * @param \CarBundle\Entity\TransmissionType $type
     *
     * @return Transmission
     */
    public function setType(\CarBundle\Entity\TransmissionType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \CarBundle\Entity\TransmissionType
     */
    public function getType()
    {
        return $this->type;
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
}
