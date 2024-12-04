<?php

require "database.php";

class Ville extends Database
{
    public function getAll() {
        return $this->selectAll("villes_france_free");
    }
    public function getTen($villeToFind) {
        return $this->selectTen("villes_france_free", $villeToFind);
    }
    public function findId($id){
        return $this->find("villes_france_free",$id);
    }
}
?>