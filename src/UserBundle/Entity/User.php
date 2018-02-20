<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping\AttributeOverride;
use Doctrine\ORM\Mapping\AttributeOverrides;

/**
 * User entity
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 *
 * @AttributeOverrides({
 *     @AttributeOverride(name="usernameCanonical",
 *         column=@ORM\Column(
 *             name="usernameCanonical",
 *             type="string",
 *             length=255,
 *             unique=false
 *         )
 *     ),
 *     @AttributeOverride(name="username",
 *         column=@ORM\Column(
 *             name="username",
 *             type="string",
 *             length=255,
 *             unique=false
 *         )
 *     )
 * })
 */
class User extends BaseUser
{
    /**
     * @var $id int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var $facebook_id string
     *
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
     */
    protected $facebook_id;

    /**
     * @var $facebook_access_token string
     *
     * @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true)
     */
    protected $facebook_access_token;

    /**
     * @var $google_id string
     *
     * @ORM\Column(name="google_id", type="string", length=255, nullable=true)
     */
    protected $google_id;

    /**
     * @var $google_access_token string
     *
     * @ORM\Column(name="google_access_token", type="string", length=255, nullable=true)
     */
    protected $google_access_token;

    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\UserCar", mappedBy="user")
     */
    protected $userCar;

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
     * Set facebookId
     *
     * @param string $facebookId
     *
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebook_id = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    /**
     * Set facebookAccessToken
     *
     * @param string $facebookAccessToken
     *
     * @return User
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebook_access_token = $facebookAccessToken;

        return $this;
    }

    /**
     * Get facebookAccessToken
     *
     * @return string
     */
    public function getFacebookAccessToken()
    {
        return $this->facebook_access_token;
    }

    /**
     * Set googleId
     *
     * @param string $googleId
     *
     * @return User
     */
    public function setGoogleId($googleId)
    {
        $this->google_id = $googleId;

        return $this;
    }

    /**
     * Get googleId
     *
     * @return string
     */
    public function getGoogleId()
    {
        return $this->google_id;
    }

    /**
     * Set googleAccessToken
     *
     * @param string $googleAccessToken
     *
     * @return User
     */
    public function setGoogleAccessToken($googleAccessToken)
    {
        $this->google_access_token = $googleAccessToken;

        return $this;
    }

    /**
     * Get googleAccessToken
     *
     * @return string
     */
    public function getGoogleAccessToken()
    {
        return $this->google_access_token;
    }

    /**
     * Add userCar
     *
     * @param \UserBundle\Entity\UserCar $userCar
     *
     * @return User
     */
    public function addUserCar(\UserBundle\Entity\UserCar $userCar)
    {
        $this->userCar[] = $userCar;

        return $this;
    }

    /**
     * Remove userCar
     *
     * @param \UserBundle\Entity\UserCar $userCar
     */
    public function removeUserCar(\UserBundle\Entity\UserCar $userCar)
    {
        $this->userCar->removeElement($userCar);
    }

    /**
     * Get userCar
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserCar()
    {
        return $this->userCar;
    }
}
