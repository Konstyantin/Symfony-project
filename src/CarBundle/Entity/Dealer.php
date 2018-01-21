<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dealer
 *
 * @ORM\Table(name="dealer")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\DealerRepository")
 */
class Dealer
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
     * @ORM\Column(name="city", type="string")
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string")
     */
    protected $street;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer")
     */
    protected $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="integer")
     */
    protected $phone;

    /**
     * @var integer
     *
     * @ORM\Column(name="postcode", type="integer")
     */
    protected $postcode;
    
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
     * Set city
     *
     * @param string $city
     *
     * @return Dealer
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Dealer
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Dealer
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Dealer
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
     * Set postcode
     *
     * @param integer $postcode
     *
     * @return Dealer
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return integer
     */
    public function getPostcode()
    {
        return $this->postcode;
    }
}
