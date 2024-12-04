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
    public function selectAll($table, $nb=1000){
        $this->connection();
        $sql = "SELECT *FROM ".$table." LIMIT ".$nb;
        $sth = $this->dbh->query($sql);
        return $sth->fetchAll();
    }
    public function selectTen($table,$villeToFind,$nb=10) {
        $this->connection();
        $sql = "SELECT * FROM ".$table." WHERE ville_nom LIKE '".$villeToFind ."%' LIMIT ".$nb;
        $sth = $this->dbh->query($sql);
        $results=$sth->fetchAll(PDO::FETCH_ASSOC);
        $data=[];
        foreach ($results as $result) {
            array_push($data,["label"=>$result["ville_nom"],"code_post"=>$result["ville_code_postal"],"id"=>$result["id"]]);
        }
        return json_encode($data);
    }
    public function find($table,$id) {
        $this->connection();
        $sql = "SELECT * FROM ".$table." WHERE id =".$id;
        $sth = $this->dbh->query($sql);
        return $sth->fetch ();
    }
    
}


?>