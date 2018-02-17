<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Offers
 *
 * @ORM\Table(name="Offers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OffersRepository")
 */
class Offers
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
     * @ORM\Column(name="title", type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="short_description", type="text")
     */
    protected $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="offers_image_id", referencedColumnName="id")
     */
    protected $offersImage;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\OffersCategory", inversedBy="offers", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $offersCategory;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;

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
     * Set title
     *
     * @param string $title
     *
     * @return Offers
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     *
     * @return Offers
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Offers
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set offersImage
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $offersImage
     *
     * @return Offers
     */
    public function setOffersImage(\Application\Sonata\MediaBundle\Entity\Media $offersImage = null)
    {
        $this->offersImage = $offersImage;

        return $this;
    }

    /**
     * Get offersImage
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getOffersImage()
    {
        return $this->offersImage;
    }

    /**
     * Set offersCategory
     *
     * @param \AppBundle\Entity\OffersCategory $offersCategory
     *
     * @return Offers
     */
    public function setOffersCategory(\AppBundle\Entity\OffersCategory $offersCategory = null)
    {
        $this->offersCategory = $offersCategory;

        return $this;
    }

    /**
     * Get offersCategory
     *
     * @return \AppBundle\Entity\OffersCategory
     */
    public function getOffersCategory()
    {
        return $this->offersCategory;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Offers
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
}
