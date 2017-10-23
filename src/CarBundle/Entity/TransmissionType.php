<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TransmissionType
 *
 * @ORM\Table(name="transmission_type")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\TransmissionTypeRepository")
 */
class TransmissionType
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
     * @ORM\Column(name="title", type="string", length=45)
     */
    protected $title;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Transmission", mappedBy="type")
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
     * Set title
     *
     * @param string $title
     *
     * @return TransmissionType
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->transmission = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add transmission
     *
     * @param \CarBundle\Entity\Transmission $transmission
     *
     * @return TransmissionType
     */
    public function addTransmission(\CarBundle\Entity\Transmission $transmission)
    {
        $this->transmission[] = $transmission;

        return $this;
    }

    /**
     * Remove transmission
     *
     * @param \CarBundle\Entity\Transmission $transmission
     */
    public function removeTransmission(\CarBundle\Entity\Transmission $transmission)
    {
        $this->transmission->removeElement($transmission);
    }

    /**
     * Get transmission
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransmission()
    {
        return $this->transmission;
    }
}
