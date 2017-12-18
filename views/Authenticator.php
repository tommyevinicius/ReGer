<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 18/12/17
 * Time: 11:11
 */

namespace TVTS;

use TVTS\Entity\User;
use TVTS\Service\SessionService;
use TVTS\{
    PasswordHash
};

class Authenticator
{
    /**
     * @var array
     */
    private $credentials = [];

    /**
     * @var User
     */
    private $user;

    /**
     * Authenticator constructor.
     * @param array $credentials
     * @param User $user
     * @throws \Exception
     */
    public function __construct(array $credentials = [], User $user)
    {
        if (!isset($credentials['email'])
            && isset($credentials['password'])) {
            throw new \Exception("Invalid credentials data!");
        }

        $this->credentials = $credentials;
        $this->user = $user;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function authenticate()
    {
        $user = $this->user->where(['email' => $this->credentials['email']]);

        if (!$user) {
            throw new \Exception("Login or password are invalid!");
        }

        $passwordHash = new PasswordHash();

        if (!$passwordHash->isValidPassword($this->credentials['password'], $user['password'])) {
            throw new \Exception("Login or password are invalid!");
        }

        unset($user['password']);

        return $user;
    }

    /**
     * @param SessionService $session
     * @param $user
     * @return mixed
     */
    public function setUserInSession(SessionService $session, $user)
    {
        $session->sessionStart();

        $_SESSION['user'] = $user;

        return $user;
    }
}