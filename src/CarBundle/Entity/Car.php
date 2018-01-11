<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Car Entity
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\CarRepository")
 */
class Car
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
     * @Assert\Length(min="3", max="45")
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="price", type="integer")
     */
    protected $price;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Model", inversedBy="car", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    protected $model;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Body", mappedBy="car", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $body;

    /**
     * @ORM\ManyToMany(targetEntity="CarBundle\Entity\Engine", inversedBy="car", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="car_engines")
     */
    protected $engine;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Fuel", mappedBy="car", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $fuel;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Dynamics", mappedBy="car", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $dynamics;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Feature", mappedBy="car", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $feature;

    /**
     * @ORM\ManyToMany(targetEntity="CarBundle\Entity\Transmission", inversedBy="car")
     * @ORM\JoinTable(name="car_transmission")
     */
    protected $transmission;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="logo_id", referencedColumnName="id")
     */
    protected $imageLogo;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="preview_id", referencedColumnName="id")
     */
    protected $imagePreview;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->body = new \Doctrine\Common\Collections\ArrayCollection();
        $this->engine = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fuel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dynamics = new \Doctrine\Common\Collections\ArrayCollection();
        $this->feature = new \Doctrine\Common\Collections\ArrayCollection();
        $this->transmission = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Car
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
     * Set price
     *
     * @param integer $price
     *
     * @return Car
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
     * Set model
     *
     * @param \CarBundle\Entity\Model $model
     *
     * @return Car
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
     * Add body
     *
     * @param \CarBundle\Entity\Body $body
     *
     * @return Car
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
     * Add engine
     *
     * @param \CarBundle\Entity\Engine $engine
     *
     * @return Car
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

    /**
     * Add fuel
     *
     * @param \CarBundle\Entity\Fuel $fuel
     *
     * @return Car
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
     * @return Car
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
     * Add feature
     *
     * @param \CarBundle\Entity\Feature $feature
     *
     * @return Car
     */
    public function addFeature(\CarBundle\Entity\Feature $feature)
    {
        $this->feature[] = $feature;

        return $this;
    }

    /**
     * Remove feature
     *
     * @param \CarBundle\Entity\Feature $feature
     */
    public function removeFeature(\CarBundle\Entity\Feature $feature)
    {
        $this->feature->removeElement($feature);
    }

    /**
     * Get feature
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * Add transmission
     *
     * @param \CarBundle\Entity\Transmission $transmission
     *
     * @return Car
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

    /**
     * Set imageLogo
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $imageLogo
     *
     * @return Car
     */
    public function setImageLogo(\Application\Sonata\MediaBundle\Entity\Media $imageLogo = null)
    {
        $this->imageLogo = $imageLogo;

        return $this;
    }

    /**
     * Get imageLogo
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getImageLogo()
    {
        return $this->imageLogo;
    }

    /**
     * Set imagePreview
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $imagePreview
     *
     * @return Car
     */
    public function setImagePreview(\Application\Sonata\MediaBundle\Entity\Media $imagePreview = null)
    {
        $this->imagePreview = $imagePreview;

        return $this;
    }

    /**
     * Get imagePreview
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getImagePreview()
    {
        return $this->imagePreview;
    }

    /**
     * Use Car entity as string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
    }
}
