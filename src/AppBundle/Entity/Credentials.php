<?php
/**
 * Created by PhpStorm.
 * User: mschultz
 * Date: 12/7/16
 * Time: 4:17 PM
 */

namespace AppBundle\Entity;


class Credentials
{
    protected $login;

    protected $password;

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     * @return Credentials
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return Credentials
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}