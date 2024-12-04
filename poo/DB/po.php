<?php 

class Personnel {
    protected $nom="";
    protected $prenom="";
    
    
    function __construct($n,$p) {
        $this->nom=$n;
        $this->prenom=$p;
    }
    
    public function Affiche() {
            echo "Nom : ".$this->nom;
            echo "  -  Prenom : ".$this->prenom;
            //echo
    }
}

    $un_salarie = new Personnel("MARTIN", "PIERRE");
    $un_salarie->Affiche();

?>