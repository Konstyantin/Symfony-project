<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Feature
 *
 * @Vich\Uploadable
 * @ORM\Table(name="feature")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\FeatureRepository")
 */
class Feature
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
     * @ORM\Column(name="short_description", type="string")
     */
    protected $short_description;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="full_description", type="string")
     */
    protected $full_description;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Assert\Image(
     *     mimeTypes={"image/jpeg", "image/png"},
     *     mimeTypesMessage = "Wrong file type (jpg,gif)",
     *     maxHeight="290",
     *     maxWidth="520"
     * )
     *
     * @Vich\UploadableField(mapping="feature_image", fileNameProperty="imageName", size="imageSize")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Car", inversedBy="feature")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id", nullable=true)
     */
    protected $car;

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
     * Set shortDescription
     *
     * @param string $shortDescription
     *
     * @return Feature
     */
    public function setShortDescription($shortDescription)
    {
        $this->short_description = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->short_description;
    }

    /**
     * Set fullDescription
     *
     * @param string $fullDescription
     *
     * @return Feature
     */
    public function setFullDescription($fullDescription)
    {
        $this->full_description = $fullDescription;

        return $this;
    }

    /**
     * Get fullDescription
     *
     * @return string
     */
    public function getFullDescription()
    {
        return $this->full_description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->car = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add car
     *
     * @param \CarBundle\Entity\Car $car
     *
     * @return Feature
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
     * Set car
     *
     * @param \CarBundle\Entity\Car $car
     *
     * @return Feature
     */
    public function setCar(\CarBundle\Entity\Car $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Model
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return Model
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Get web path
     *
     * Get web path to upload image if record have image
     *
     * @return string
     */
    public function getWebPath()
    {
        return ($this->imageName) ? $this->imageName : false;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Model
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Call magic method toString
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
    }

    /**
     * Set image
     *
     * @param \Application\Sonata\MediaBundle\Entity\GalleryHasMedia $image
     *
     * @return Feature
     */
    public function setImage(\Application\Sonata\MediaBundle\Entity\GalleryHasMedia $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Application\Sonata\MediaBundle\Entity\GalleryHasMedia
     */
    public function getImage()
    {
        return $this->image;
    }
}
