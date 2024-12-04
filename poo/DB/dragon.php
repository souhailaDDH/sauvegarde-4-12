<?php
class jeux 
{
    private $personnages =array("dragon"=>"","chevalier"=>"");
    
    public function __construction($d,$c){
        $this->personnages["dragon"]=array("nom"=>$d,"vie"=>20);
        $this->personnages["chevalier"]=array("nom"=>$c,"vie"=>18);
    }
    
    public function getPersonnages() {
        return $this->personnages;
    }
    public function go() {
        
    }
    
}

$jeux = new Jeux ("Eliott","Perceval");
var_dump( $jeux->getPersonnages());
?>