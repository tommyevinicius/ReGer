<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 18/12/17
 * Time: 11:10
 */

namespace TVTS;

class PasswordHash
{
    private $password;

    /**
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return bool|string
     */
    public function generate()
    {
        $opt = ['cost' => 11];

        return password_hash($this->password, PASSWORD_BCRYPT, $opt);
    }

    /**
     * @param $password
     * @param $hash
     * @return bool
     */
    public function isValidPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
}