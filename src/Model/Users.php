<?php

class User{
    private $id;
    private $username;
    private $token; // -- Login => Authenticate with token
    private $first_name;
    private $last_name;
    private $role;

    public function getUserId()
    {
        return $this->id;
    }

    public function setUserId($id)
    {
        $this->id = $id;
    }

    public function getUserName()
    {
        return $this->username;
    }

    public function setUserName($username)
    {
        $this->username = $username;
    }

    public function getUserFirstName()
    {
        return $this->first_name;
    }

    public function setUserFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getUserLastName()
    {
        return $this->last_name;
    }

    public function setUserLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getUserRole()
    {
        return $this->role;
    }

    public function setUserRole($role)
    {
        $this->role = $role;
    }
}