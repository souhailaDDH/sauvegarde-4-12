<?php

require_once "database.php";

class Departement extends Database
{
    public function getAll() {
        return $this->selectAll("departements");
    }
}

?>