<?php
require_once "Database.php";
class Departement extends Database
{
    public function getAll() {
        return $this->selectAll("departements");
    }
}