<?php


class Database
{
    private $dbh;
    public function connection() {
        
        $this->dbh = new PDO('mysql:host=localhost;dbname=pter', 'pter', 'plopplip');
        
    }
    
    public function selectAll($table,$nb=1000) {
        $this->connection();
        $sql = "SELECT * FROM ".$table." LIMIT ".$nb;
        $sth = $this->dbh->query($sql);
        return json_encode($sth->fetchAll());
        
    }
    public function selectTen($table,$villeToFind,$nb=10){
        $this->connection();
        $sql = "SELECT ville_nom,ville_code_postal FROM ".$table." WHERE ville_nom LIKE '".$villeToFind ."%' LIMIT ".$nb;
        //echo $sql;
        $sth = $this->dbh->query($sql);
        $results=$sth->fetchAll(PDO::FETCH_ASSOC);
        $data=[];
        foreach ($results as $result) {
            //array_push($data,["label"=>$result["ville_nom"],"code_post"=>$result["ville_code_postal"],"id"=>$result["id"]]);
        }
        return $results;
    }
    public function find($table,$id) {
        $this->connection();
        $sql = "SELECT * FROM ".$table." WHERE id=".$id;
        $sth = $this->dbh->query($sql);
        return $sth->fetch();
    }
}
