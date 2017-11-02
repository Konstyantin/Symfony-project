<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 02.11.17
 * Time: 23:56
 */
namespace CarBundle\Helper;

use CarBundle\Entity\Body;
use Doctrine\ORM\EntityManager;

/**
 * Class BodyHelper
 * @package CarBundle\Helper
 */
class BodyHelper
{
    /**
     * @var $width integer
     */
    protected $width;

    /**
     * @var $length integer
     */
    protected $length;

    /**
     * @var $height integer
     */
    protected $height;

    /**
     * @var $weight integer
     */
    protected $weight;

    /**
     * @var $wheel_base integer
     */
    protected $wheel_base;

    /**
     * @var $aerodynamic_coefficient integer
     */
    protected $aerodynamic_coefficient;

    /**
     * Create body record
     *
     * Create body record by array data and return create body record
     *
     * @param EntityManager $em
     * @param array $data
     * @return Body
     */
    public function createBodyRecord(EntityManager $em, array $data)
    {
        $this->defineBodyData($data);

        $body = new Body();

        $body->setWidth($this->width);
        $body->setWeight($this->weight);
        $body->setLength($this->length);
        $body->setHeight($this->height);
        $body->setWeight($this->weight);
        $body->setWheelBase($this->wheel_base);
        $body->setAerodynamicCoefficient($this->aerodynamic_coefficient);

        $em->persist($body);
        $em->flush();

        return $body;
    }

    /**
     * Define body data
     *
     * Define body data as helper property form sender data array
     *
     * @param array $data
     */
    protected function defineBodyData(array $data)
    {
        $this->width = $data['width'];
        $this->length = $data['length'];
        $this->height = $data['height'];
        $this->weight = $data['weight'];
        $this->wheel_base = $data['wheel_base'];
        $this->aerodynamic_coefficient = $data['aerodynamic_coefficient'];
    }
}