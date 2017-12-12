<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 12.12.17
 * Time: 23:48
 */
namespace CarBundle\Form\DataTransformer;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * Class GalleryToMediaTransformer
 * @package CarBundle\Form\DataTransformer
 */
class GalleryToMediaTransformer implements DataTransformerInterface
{
    /**
     * @var EntityManager $em
     */
    private $em;

    /**
     * GalleryToMediaTransformer constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function transform($value)
    {
        // TODO: Implement transform() method.
    }

    public function reverseTransform($value)
    {
        // TODO: Implement reverseTransform() method.
    }
}