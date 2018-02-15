<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarService
 *
 * @ORM\Table(name="car_service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarServiceRepository")
 */
class CarService
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
     * @ORM\Column(name="first_name", type="string")
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string")
     */
    protected $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="string")
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    protected $email;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Car", inversedBy="carService", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id", unique=false, nullable=false)
     */
    protected $car;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Model", inversedBy="carService", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id", unique=false, nullable=false)
     */
    protected $model;

    /**
     * @var string
     *
     * @ORM\Column(name="vin", type="string")
     */
    protected $vin;

    /**
     * @var string
     *
     * @ORM\Column(name="mileage", type="integer")
     */
    protected $mileage;

    /**
     * @var integer
     *
     * @ORM\Column(name="license_plate", type="integer")
     */
    protected $licensePlate;

    /**
     * @ORM\ManyToOne(targetEntity="DealerBundle\Entity\Dealer", inversedBy="carService", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="dealer_id", referencedColumnName="id", unique=false, nullable=false)
     */
    protected $dealer;

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer")
     */
    protected $date;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ServiceStatus", inversedBy="carService", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id", unique=false, nullable=false)
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserCar", inversedBy="carService", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_car_id", referencedColumnName="id", unique=false, nullable=true)
     */
    protected $userCar;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ServiceAction", mappedBy="carService")
     */
    protected $serviceAction;

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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return CarService
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return CarService
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return CarService
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return CarService
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set vin
     *
     * @param string $vin
     *
     * @return CarService
     */
    public function setVin($vin)
    {
        $this->vin = $vin;

        return $this;
    }

    /**
     * Get vin
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Set mileage
     *
     * @param integer $mileage
     *
     * @return CarService
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get mileage
     *
     * @return integer
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Set licensePlate
     *
     * @param integer $licensePlate
     *
     * @return CarService
     */
    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;

        return $this;
    }

    /**
     * Get licensePlate
     *
     * @return integer
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * Set date
     *
     * @param integer $date
     *
     * @return CarService
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return integer
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set model
     *
     * @param \CarBundle\Entity\Model $model
     *
     * @return CarService
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
     * Set dealer
     *
     * @param \DealerBundle\Entity\Dealer $dealer
     *
     * @return CarService
     */
    public function setDealer(\DealerBundle\Entity\Dealer $dealer = null)
    {
        $this->dealer = $dealer;

        return $this;
    }

    /**
     * Get dealer
     *
     * @return \DealerBundle\Entity\Dealer
     */
    public function getDealer()
    {
        return $this->dealer;
    }

    /**
     * Set status
     *
     * @param \AppBundle\Entity\ServiceStatus $status
     *
     * @return CarService
     */
    public function setStatus(\AppBundle\Entity\ServiceStatus $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\ServiceStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set car
     *
     * @param \CarBundle\Entity\Car $car
     *
     * @return CarService
     */
    public function setCar(\CarBundle\Entity\Car $car)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \CarBundle\Entity\Car
     */
    public function getCar()
    {
        return $this->car;
    }
    

    /**
     * Set userCar
     *
     * @param \AppBundle\Entity\UserCar $userCar
     *
     * @return CarService
     */
    public function setUserCar(\AppBundle\Entity\UserCar $userCar = null)
    {
        $this->userCar = $userCar;

        return $this;
    }

    /**
     * Get userCar
     *
     * @return \AppBundle\Entity\UserCar
     */
    public function getUserCar()
    {
        return $this->userCar;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->serviceAction = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add serviceAction
     *
     * @param \AppBundle\Entity\ServiceAction $serviceAction
     *
     * @return CarService
     */
    public function addServiceAction(\AppBundle\Entity\ServiceAction $serviceAction)
    {
        $this->serviceAction[] = $serviceAction;

        return $this;
    }

    /**
     * Remove serviceAction
     *
     * @param \AppBundle\Entity\ServiceAction $serviceAction
     */
    public function removeServiceAction(\AppBundle\Entity\ServiceAction $serviceAction)
    {
        $this->serviceAction->removeElement($serviceAction);
    }

    /**
     * Get serviceAction
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServiceAction()
    {
        return $this->serviceAction;
    }
}
