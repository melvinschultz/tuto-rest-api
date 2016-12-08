<?php

/**
 * Created by PhpStorm.
 * User: mschultz
 * Date: 12/8/16
 * Time: 10:17 AM
 */
namespace AppBundle\Security;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class AuthTokenUserProvider implements UserProviderInterface
{
    protected $authTokenRepository;
    protected $userRepository;

    public function __construct(EntityRepository $authTokenRepository, EntityRepository $userRepository)
    {
        $this->authTokenRepository = $authTokenRepository;
        $this->userRepository = $userRepository;
    }

    public function getAuthToken($authTokenHeader)
    {
        return $this->authTokenRepository->findOneByValue($authTokenHeader);
    }

    public function loadUserByUsername($email)
    {
        return $this->userRepository->findByEmail($email);
    }

    public function refreshUser(UserInterface $user)
    {
        // le système d'authentification est stateless, on ne doit jamais appeler la méthode refreshUser
        throw new UnsupportedUserException();
    }

    public function supportsClass($class)
    {
        return 'AppBundle\Entity\User' === $class;
    }
}