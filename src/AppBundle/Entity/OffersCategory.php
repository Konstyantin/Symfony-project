<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OffersCategory
 *
 * @ORM\Table(name="offers_category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OffersCategoryRepository")
 */
class OffersCategory
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
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OffersCategory", mappedBy="parent")
     */
    protected $children;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\OffersCategory", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $parent;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Offers", mappedBy="offersCategory")
     */
    protected $offers;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="offers_category_image_id", referencedColumnName="id")
     */
    protected $offersCategoryImage;


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
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OffersCategory
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
     * Add child
     *
     * @param \AppBundle\Entity\OffersCategory $child
     *
     * @return OffersCategory
     */
    public function addChild(\AppBundle\Entity\OffersCategory $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \AppBundle\Entity\OffersCategory $child
     */
    public function removeChild(\AppBundle\Entity\OffersCategory $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \AppBundle\Entity\OffersCategory $parent
     *
     * @return OffersCategory
     */
    public function setParent(\AppBundle\Entity\OffersCategory $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \AppBundle\Entity\OffersCategory
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Use as call entity as string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->name;
    }

    /**
     * Add offer
     *
     * @param \AppBundle\Entity\Offers $offer
     *
     * @return OffersCategory
     */
    public function addOffer(\AppBundle\Entity\Offers $offer)
    {
        $this->offers[] = $offer;

        return $this;
    }

    /**
     * Remove offer
     *
     * @param \AppBundle\Entity\Offers $offer
     */
    public function removeOffer(\AppBundle\Entity\Offers $offer)
    {
        $this->offers->removeElement($offer);
    }

    /**
     * Get offers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return OffersCategory
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
     * Set offersCategoryImage
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $offersCategoryImage
     *
     * @return OffersCategory
     */
    public function setOffersCategoryImage(\Application\Sonata\MediaBundle\Entity\Media $offersCategoryImage = null)
    {
        $this->offersCategoryImage = $offersCategoryImage;

        return $this;
    }

    /**
     * Get offersCategoryImage
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getOffersCategoryImage()
    {
        return $this->offersCategoryImage;
    }
}
