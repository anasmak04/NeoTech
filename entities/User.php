<?php

namespace entities;

use http\Exception\InvalidArgumentException;

class User{

    private $fullname;
    private $username;

    private $password;
    private $confirmPwd;




    public static function  CreateInstance($fullname, $username, $password, $confirmPwd){
       $user = new User();

        $user->fullname = $fullname;
        $user->username = $username;
        $user->password = $password;
        $user->confirmPwd = $confirmPwd;

        if($username == null || empty($username)) throw new InvalidArgumentException("username cannot be empty or null");
        if($password == null || empty($password)) throw new InvalidArgumentException("password cannot be empty or null");

        return $user;
    }


    public function getFullname()
    {
        return $this->fullname;
    }


    public function setFullname($fullname): void
    {
        $this->fullname = $fullname;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username): void
    {
        $this->username = $username;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getConfirmPwd()
    {
        return $this->confirmPwd;
    }


    public function setConfirmPwd($confirmPwd): void
    {
        $this->confirmPwd = $confirmPwd;
    }


}