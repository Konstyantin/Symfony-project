<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

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
     * @Assert\NotBlank()
     *
     * @Assert\Length(min="3", max="45")
     * @ORM\Column(name="name", type="string", length=45)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Car", mappedBy="model", cascade={"persist", "remove"})
     */
    protected $car;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="logo_id", referencedColumnName="id")
     */
    protected $imageLogo;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UserCar", mappedBy="model")
     */
    protected $userCar;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CarService", mappedBy="model")
     */
    protected $carService;

    /**
     * Set imageLogo
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $imageLogo
     *
     * @return Model
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
     * Constructor
     */
    public function __construct()
    {
        $this->car = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \CarBundle\Entity\Car $car
     *
     * @return Model
     */
    public function addCar(\CarBundle\Entity\Car $car)
    {
        $this->car[] = $car;

        return $this;
    }

    /**
     * Remove car
     *
     * @param \CarBundle\Entity\Car $car
     */
    public function removeCar(\CarBundle\Entity\Car $car)
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
     * @param \AppBundle\Entity\UserCar $userCar
     *
     * @return Model
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

    /**
     * Call for handle Model entity as string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }

    /**
     * Add carService
     *
     * @param \AppBundle\Entity\CarService $carService
     *
     * @return Model
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
}
