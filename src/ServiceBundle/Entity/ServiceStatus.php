<?php

namespace ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ServiceBundle\Entity\CarService;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * ServiceStatus
 *
 * @ORM\Table(name="service_status")
 * @ORM\Entity(repositoryClass="ServiceBundle\Repository\ServiceStatusRepository")
 * @UniqueEntity(
 *     fields={"status"},
 *     errorPath="status",
 *     message="This status is already exists"
 * )
 */
class ServiceStatus
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
     * @ORM\Column(name="status", type="string")
     */
    protected $status;

    /**
     * @ORM\OneToMany(targetEntity="ServiceBundle\Entity\CarService", mappedBy="status")
     */
    protected $carService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->carService = new ArrayCollection();
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
     * Set status
     *
     * @param string $status
     *
     * @return ServiceStatus
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add carService
     *
     * @param CarService $carService
     *
     * @return ServiceStatus
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
     * Return status
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->status;
    }
}
