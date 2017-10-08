<?php

/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 08.10.17
 * Time: 19:07
 */
namespace UserBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use FOS\UserBundle\Model\UserManagerInterface;

/**
 * Class EmailUserProvider
 *
 * EmailUserProvider is a user provider can load users from any source (databases,
 * configuration, web service). This is totally independent of how the authentication
 * information is submitted or what the UserInterface object looks like.
 *
 * Override default user provider load user by username to load user by email
 *
 * @package UserBundle\Security
 */
class EmailUserProvider implements UserProviderInterface
{
    /**
     * @var UserManagerInterface $userManager
     */
    protected $userManager;

    /**
     * Constructor.
     *
     * @param UserManagerInterface $userManager
     */
    public function __construct(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Load user by username
     *
     * Load user by found result which return findUser method
     * FindUser method override for find user by user email instead username
     *
     * @param string $username
     * @return \FOS\UserBundle\Model\UserInterface
     */
    public function loadUserByUsername($username)
    {
        $user = $this->findUser($username);

        if (!$user) {
            throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
        }

        return $user;
    }

    /**
     * Refreshes the user for the account interface.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     *
     * @param UserInterface $user
     * @return \FOS\UserBundle\Model\UserInterface
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof UserInterface) {
            throw new UnsupportedUserException(sprintf('Expected an instance of FOS\UserBundle\Model\UserInterface, but got "%s".', get_class($user)));
        }

        if (!$this->supportsClass(get_class($user))) {
            throw new UnsupportedUserException(sprintf('Expected an instance of %s, but got "%s".', $this->userManager->getClass(), get_class($user)));
        }

        if (null === $reloadedUser = $this->userManager->findUserBy(array('id' => $user->getId()))) {
            throw new UsernameNotFoundException(sprintf('User with ID "%s" could not be reloaded.', $user->getId()));
        }

        return $reloadedUser;
    }

    /**
     * Whether this provider supports the given user class
     *
     * @param string $class
     * @return bool
     */
    public function supportsClass($class)
    {
        $userClass = $this->userManager->getClass();

        return $userClass === $class || is_subclass_of($class, $userClass);
    }

    /**
     * Find user
     *
     * Find user by sender email
     *
     * @param $email string
     * @return \FOS\UserBundle\Model\UserInterface
     */
    protected function findUser($email)
    {
        return $this->userManager->findUserByEmail($email);
    }
}