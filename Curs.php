<?php


class Curs {
    private $id;
    private $nume;
    private $data_incepere;
    private $sala;
    
    public function __construct($nume, $data_incepere, $sala) {
        $this->nume = $nume;
        $this->data_incepere = $data_incepere;
        $this->sala = $sala;
    }
    public function getId() {
        return $this->id;
    }

    public function getNume() {
        return $this->nume;
    }

    public function getData_incepere() {
        return $this->data_incepere;
    }

    public function getSala() {
        return $this->sala;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNume($nume) {
        $this->nume = $nume;
        return $this;
    }

    public function setData_incepere($data_incepere) {
        $this->data_incepere = $data_incepere;
        return $this;
    }

    public function setSala($sala) {
        $this->sala = $sala;
        return $this;
    }



    
}
