<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 02.11.17
 * Time: 23:56
 */
namespace CarBundle\Helper;

use CarBundle\Entity\Fuel;
use Doctrine\ORM\EntityManager;

/**
 * Class FuelHelper
 * @package CarBundle\Helper
 */
class FuelHelper
{
    /**
     * @var $city integer
     */
    private $city;

    /**
     * @var $country integer
     */
    private $country;

    /**
     * @var $combined  integer
     */
    private $combined;

    /**
     * @var $emission integer
     */
    private $emission;

    /**
     * Create Fuel record
     *
     * Create fuel record by array data and return create fuel record
     *
     * @param EntityManager $em
     * @param array $data
     * @return Fuel
     */
    public function createFuelRecord(EntityManager $em, array $data)
    {
        $this->defineFuelData($data);

        $fuel = new Fuel();

        $fuel->setCity($this->city);
        $fuel->setCombined($this->combined);
        $fuel->setCountry($this->country);
        $fuel->setEmission($this->emission);

        $em->persist($fuel);
        $em->flush();

        return $fuel;
    }

    /**
     * Update Fuel record
     *
     * Update fuel record data for sender fuel
     *
     * @param EntityManager $em
     * @param $data
     * @param $fuel
     */
    public function updateFuelRecord(EntityManager $em, $data, Fuel $fuel)
    {
        $this->defineFuelData($data);

        $fuel->setCity($this->city);
        $fuel->setEmission($this->emission);
        $fuel->setCountry($this->country);
        $fuel->setCombined($this->combined);

        $em->persist($fuel);
        $em->flush();
    }

    /**
     * Define fuel data
     *
     * Define fuel data as helper property form sender data array
     *
     * @param array $data
     */
    protected function defineFuelData(array $data)
    {
        $this->combined = $data['combined'];
        $this->emission = $data['emission'];
        $this->city = $data['city'];
        $this->country = $data['country'];
    }
}