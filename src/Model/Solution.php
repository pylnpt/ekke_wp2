<?php

class Solution{
    private $id;
    private $solution_name;
    private $solution_type;
    private $solution_author;
    private $solution_description;

    public function getSolutionId()
    {
        return $this->id;
    }

    public function setSolutionId($id)
    {
        $this->id = $id;
    }

    public function getSolutionName()
    {
        return $this->solution_name;
    }

    public function setSolutionName($solution_name)
    {
        $this->solution_name = $solution_name;
    }

    public function getSolutionAuthor()
    {
        return $this->solution_author;
    }

    public function setSolutionAuthor($solution_author)
    {
        $this->solution_author = $solution_author;
    }

    public function getSolutionType()
    {
        return $this->solution_type;
    }

    public function setSolutionType($solution_type)
    {
        $this->solution_type = $solution_type;
    }

    public function getSolutionDescription()
    {
        return $this->solution_description;
    }

    public function setSolutionDescription($solution_description)
    {
        $this->solution_description = $solution_description;
    }
}