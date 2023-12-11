<?php

namespace entities;

class User{

    private $fullname;
    private $username;

    private $password;
    private $confirmPwd;

    /**
     * @param $fullname
     * @param $username
     * @param $password
     * @param $confirmPwd
     */
    public function __construct($fullname, $username, $password, $confirmPwd)
    {
        $this->fullname = $fullname;
        $this->username = $username;
        $this->password = $password;
        $this->confirmPwd = $confirmPwd;
    }

    /**
     * @return mixed
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param mixed $fullname
     */
    public function setFullname($fullname): void
    {
        $this->fullname = $fullname;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
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
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getConfirmPwd()
    {
        return $this->confirmPwd;
    }

    /**
     * @param mixed $confirmPwd
     */
    public function setConfirmPwd($confirmPwd): void
    {
        $this->confirmPwd = $confirmPwd;
    }


}