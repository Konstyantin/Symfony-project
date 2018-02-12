<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Feature", mappedBy="car", cascade={"persist", "remove"}, orphanRemoval=true)
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CarService", mappedBy="car")
     */
    protected $carService;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserCar", mappedBy="car")
     */
    protected $userCar;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->feature = new \Doctrine\Common\Collections\ArrayCollection();
        $this->configurations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add configuration
     *
     * @param \CarBundle\Entity\Configuration $configuration
     *
     * @return Car
     */
    public function addConfiguration(\CarBundle\Entity\Configuration $configuration)
    {
        $this->configurations[] = $configuration;

        return $this;
    }

    /**
     * Remove configuration
     *
     * @param \CarBundle\Entity\Configuration $configuration
     */
    public function removeConfiguration(\CarBundle\Entity\Configuration $configuration)
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
     * @param \AppBundle\Entity\CarService $carService
     *
     * @return Car
     */
    public function addCarService(\AppBundle\Entity\CarService $carService)
    {
        $this->carService[] = $carService;

        return $this;
    }

    /**
     * Remove carService
     *
     * @param \AppBundle\Entity\CarService $carService
     */
    public function removeCarService(\AppBundle\Entity\CarService $carService)
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
     * @param \AppBundle\Entity\UserCar $userCar
     *
     * @return Car
     */
    public function addUserCar(\AppBundle\Entity\UserCar $userCar)
    {
        $this->userCar[] = $userCar;

        return $this;
    }

    /**
     * Remove userCar
     *
     * @param \AppBundle\Entity\UserCar $userCar
     */
    public function removeUserCar(\AppBundle\Entity\UserCar $userCar)
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
}
