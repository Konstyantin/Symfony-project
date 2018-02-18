<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CarBundle\Entity\Configuration;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Fuel
 *
 * @ORM\Table(name="fuel")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\FuelRepository")
 */
class Fuel
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
     * @ORM\Column(name="extra_urban", type="integer", length=11, nullable=false)
     */
    protected $extraUrban;

    /**
     * @var integer
     *
     * @ORM\Column(name="urban", type="integer", length=11, nullable=false)
     */
    protected $urban;

    /**
     * @var integer
     *
     * @ORM\Column(name="combined", type="integer", length=11, nullable=false)
     */
    protected $combined;

    /**
     * @var integer
     *
     * @ORM\Column(name="emission", type="integer", length=11, nullable=false)
     */
    protected $emission;

    /**
     * @ORM\OneToOne(targetEntity="CarBundle\Entity\Configuration", mappedBy="fuel", cascade={"persist", "remove"})
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
     * Set combined
     *
     * @param integer $combined
     *
     * @return Fuel
     */
    public function setCombined($combined)
    {
        $this->combined = $combined;

        return $this;
    }

    /**
     * Get combined
     *
     * @return integer
     */
    public function getCombined()
    {
        return $this->combined;
    }

    /**
     * Set emission
     *
     * @param integer $emission
     *
     * @return Fuel
     */
    public function setEmission($emission)
    {
        $this->emission = $emission;

        return $this;
    }

    /**
     * Get emission
     *
     * @return integer
     */
    public function getEmission()
    {
        return $this->emission;
    }

    /**
     * Set configuration
     *
     * @param Configuration $configuration
     *
     * @return Fuel
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
     * Set extraUrban
     *
     * @param integer $extraUrban
     *
     * @return Fuel
     */
    public function setExtraUrban($extraUrban)
    {
        $this->extraUrban = $extraUrban;

        return $this;
    }

    /**
     * Get extraUrban
     *
     * @return integer
     */
    public function getExtraUrban()
    {
        return $this->extraUrban;
    }

    /**
     * Set urban
     *
     * @param integer $urban
     *
     * @return Fuel
     */
    public function setUrban($urban)
    {
        $this->urban = $urban;

        return $this;
    }

    /**
     * Get urban
     *
     * @return integer
     */
    public function getUrban()
    {
        return $this->urban;
    }

    /**
     * Use when call use entity as string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->id;
    }
}
