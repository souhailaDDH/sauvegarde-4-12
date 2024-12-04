<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

class Database
{
    private $dbh;
    public function connection() {
        $this->dbh = new PDO('mysql:host=localhost;dbname=souhaila_portfolio', 'souhaila', 'plop');
        
    }
    public function selectAll($table){
        $this->connection();
        $sql = "SELECT * FROM ".$table;
        $sth = $this->dbh->query($sql);
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}


?>