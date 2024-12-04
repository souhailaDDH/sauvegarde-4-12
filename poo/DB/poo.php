<?php 

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

   class Personnel {

        const AGE_MIN = 14;
        const AGE_MAX = 65;

        private $_nom = "";
        private $prenom = "";
        private $age = 0;

    // getter
    public function getNom() {return $this->_nom;}
    public function getPrenom() {return $this->prenom;}
    public function getAge() {return $this->age;}

    //setter
    public function setNom($n) {$this->_nom=$n;}
    public function setPrenom($p) {$this->prenom=$p;}
    public function setAge($a) 
        {

        if (($a>=self::AGE_MIN)&&($a<self::AGE_MAX))
        $this->age=intval($a);

        }
    }

$une_personne = new Personnel();
$une_personne->setNom("dupont");
$une_personne->setPrenom("pierre");
$une_personne->setAge("25");

echo $une_personne->getNom(). " ";
echo $une_personne->getPrenom(). " ";
echo $une_personne->getAge().PHP_EOL;

?>