<?php

namespace entities;

use http\Exception\InvalidArgumentException;

class User{

    private $fullname;
    private $username;
    private $id_role;
    private $password;
    private $confirmPwd;




    public static function  CreateInstance($fullname, $username, $id_role ,$password, $confirmPwd){
       $user = new User();
        $user->fullname = $fullname;
        $user->username = $username;
        $user->id_role = $id_role;
        $user->password = $password;
        $user->confirmPwd = $confirmPwd;
        if($username == null || empty($username)) throw new InvalidArgumentException("username cannot be empty or null");
        if($password == null || empty($password)) throw new InvalidArgumentException("password cannot be empty or null");
        return $user;
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
    public function getIdRole()
    {
        return $this->id_role;
    }

    /**
     * @param mixed $id_role
     */
    public function setIdRole($id_role): void
    {
        $this->id_role = $id_role;
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