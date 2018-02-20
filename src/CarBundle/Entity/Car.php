<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CarBundle\Entity\Model;
use CarBundle\Entity\Feature;
use CarBundle\Entity\Configuration;
use ServiceBundle\Entity\CarService;
use UserBundle\Entity\UserCar;
use Gedmo\Mapping\Annotation as Gedmo;
use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    protected $price;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Model", inversedBy="car", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    protected $model;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Feature", mappedBy="car", cascade={"persist", "remove"})
     */
    protected $feature;

    /**
     * @ORM\ManyToMany(targetEntity="CarBundle\Entity\Configuration", inversedBy="car")
     * @ORM\JoinTable(name="car_configuration")
     */
    protected $configurations;

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
     * @var bool
     *
     * @ORM\Column(name="available", type="boolean")
     */
    protected $available;

    /**
     * @ORM\OneToMany(targetEntity="ServiceBundle\Entity\CarService", mappedBy="car")
     */
    protected $carService;

    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\UserCar", mappedBy="car", cascade={"persist", "remove"})
     */
    protected $userCar;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->feature = new ArrayCollection();
        $this->configurations = new ArrayCollection();
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
     * @param Model $model
     *
     * @return Car
     */
    public function setModel(Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Add feature
     *
     * @param Feature $feature
     *
     * @return Car
     */
    public function addFeature(Feature $feature)
    {
        $this->feature[] = $feature;

        return $this;
    }

    /**
     * Remove feature
     *
     * @param Feature $feature
     */
    public function removeFeature(Feature $feature)
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
     * Add configuration
     *
     * @param Configuration $configuration
     *
     * @return Car
     */
    public function addConfiguration(Configuration $configuration)
    {
        $this->configurations[] = $configuration;

        return $this;
    }

    /**
     * Remove configuration
     *
     * @param Configuration $configuration
     */
    public function removeConfiguration(Configuration $configuration)
    {
        $this->configurations->removeElement($configuration);
    }

    /**
     * Get configurations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConfigurations()
    {
        return $this->configurations;
    }

    /**
     * Set imageLogo
     *
     * @param Media $imageLogo
     *
     * @return Car
     */
    public function setImageLogo(Media $imageLogo = null)
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
     * @param Media $imagePreview
     *
     * @return Car
     */
    public function setImagePreview(Media $imagePreview = null)
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
        return (string) $this->getName();
    }

    /**
     * Set available
     *
     * @param boolean $available
     *
     * @return Car
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Add carService
     *
     * @param CarService $carService
     *
     * @return Car
     */
    public function addCarService(CarService $carService)
    {
        $this->carService[] = $carService;

        return $this;
    }

    /**
     * Remove carService
     *
     * @param CarService $carService
     */
    public function removeCarService(CarService $carService)
    {
        $this->carService->removeElement($carService);
    }

    /**
     * Get carService
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarService()
    {
        return $this->carService;
    }

    /**
     * Add userCar
     *
     * @param UserCar $userCar
     *
     * @return Car
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Car
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
