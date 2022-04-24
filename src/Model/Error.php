<?php

class Error{
    private $id;
    private $error_name;
    private $error_level;
    private $error_type;
    private $has_solution;

    public function getErrorId()
    {
        return $this->id;
    }

    public function setErrorId($id)
    {
        $this->id = $id;
    }

    public function getErrorName()
    {
        return $this->error_name;
    }

    public function setErrorName($error_name)
    {
        $this->error_name = $error_name;
    }

    public function getErrorLevel()
    {
        return $this->error_level;
    }

    public function setErrorLevel($error_level)
    {
        $this->error_level = $error_level;
    }

    public function getErrorType()
    {
        return $this->error_type;
    }

    public function setErrorType($error_type)
    {
        $this->error_type = $error_type;
    }

    public function getHasSolution()
    {
        return $this->has_solution;
    }

    public function setHasSolution($has_solution)
    {
        $this->has_solution = $has_solution;
    }
}