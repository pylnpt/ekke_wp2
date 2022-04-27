<?php

class PlannedPersonnel {
    private $id;
    private $prodline_id;
    private $planned_personnel_num;
    private $actual_personnel_num;
    private $comment;

    public function getPlannedPersonnelId()
    {
        return $this->id;
    }

    public function setPlannedPersonnelId($id)
    {
        $this->id = $id;
    }

    public function getProdLineId()
    {
        return $this->prodline_id;
    }

    public function setProdLineId($prodline_id)
    {
        $this->prodline_id = $prodline_id;
    }

    public function getPlannedPersonnelNum()
    {
        return $this->planned_personnel_num;
    }

    public function setPlannedPersonnelNum($planned_personnel_num)
    {
        $this->solution_author = $planned_personnel_num;
    }

    public function getActualPersonnelNum()
    {
        return $this->actual_personnel_num;
    }

    public function setActualPersonnelNum($actual_personnel_num)
    {
        $this->actual_personnel_num = $actual_personnel_num;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }
}