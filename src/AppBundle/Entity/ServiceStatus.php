<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * ServiceStatus
 *
 * @ORM\Table(name="service_status")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceStatusRepository")
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\CarService", mappedBy="status")
     */
    protected $carService;

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
     * Set carService
     *
     * @param \AppBundle\Entity\CarService $carService
     *
     * @return ServiceStatus
     */
    public function setCarService(\AppBundle\Entity\CarService $carService = null)
    {
        $this->carService = $carService;

        return $this;
    }

    /**
     * Get carService
     *
     * @return \AppBundle\Entity\CarService
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
