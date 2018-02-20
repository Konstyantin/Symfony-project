<?php

namespace CarBundle\Entity;

use CarBundle\Entity\Car;
use UserBundle\Entity\UserCar;
use Doctrine\ORM\Mapping as ORM;
use ServiceBundle\Entity\CarService;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Model
 *
 * @Vich\Uploadable
 * @UniqueEntity(
 *     "name",
 *     message="This model already exists"
 * )
 *
 * @ORM\Table(name="model")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\ModelRepository")
 *
 */
class Model
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
     * @ORM\Column(name="name", type="string", length=45)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Car", mappedBy="model", cascade={"persist", "remove"})
     */
    protected $car;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="logo_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $imageLogo;

    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\UserCar", mappedBy="model", cascade={"persist", "remove"})
     */
    protected $userCar;

    /**
     * @ORM\OneToMany(targetEntity="ServiceBundle\Entity\CarService", mappedBy="model", cascade={"persist", "remove"})
     */
    protected $carService;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true, nullable=true)
     */
    protected $slug;

    /**
     * Set imageLogo
     *
     * @param Media $imageLogo
     *
     * @return Model
     */
    public function setImageLogo(Media $imageLogo = null)
    {
        $this->imageLogo = $imageLogo;

        return $this;
    }

    /**
     * Get imageLogo
     *
     * @return Media
     */
    public function getImageLogo()
    {
        return $this->imageLogo;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->car = new ArrayCollection();
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
     * @return Model
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
     * Add car
     *
     * @param Car $car
     *
     * @return Model
     */
    public function addCar(Car $car)
    {
        $this->car[] = $car;

        return $this;
    }

    /**
     * Remove car
     *
     * @param Car $car
     */
    public function removeCar(Car $car)
    {
        $this->car->removeElement($car);
    }

    /**
     * Get car
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Add userCar
     *
     * @param UserCar $userCar
     *
     * @return Model
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
     * Add carService
     *
     * @param CarService $carService
     *
     * @return Model
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Model
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

    /**
     * Call for handle Model entity as string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }
}
