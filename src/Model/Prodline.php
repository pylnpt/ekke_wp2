<?php

class ProdLine {
    private $id;
    private $prodline_name;
    private $area_id;
    private $min_personel;
    private $max_personel;

    public function getProdLineId()
    {
        return $this->id;
    }

    public function setProdLineId($id)
    {
        $this->id = $id;
    }
    
    public function getProdLineName()
    {
        return $this->prodline_name;
    }

    public function setProdLineName($prodline_name)
    {
        $this->prodline_name = $prodline_name;
    }

    public function getAreaId()
    {
        return $this->area_id;
    }

    public function setAreaId($area_id)
    {
        $this->area_id = $area_id;
    }

    public function getMinPersonnel()
    {
        return $this->min_personnel;
    }

    public function setMinPersonnel($min_personnel)
    {
        $this->min_personnel = $min_personnel;
    }

    public function getMaxPersonnel()
    {
        return $this->max_personnel;
    }

    public function setMaxPersonnel($max_personnel)
    {
        $this->max_personnel = $max_personnel;
    }
}