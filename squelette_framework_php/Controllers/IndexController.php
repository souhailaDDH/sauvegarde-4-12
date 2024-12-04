<?php

namespace Controllers;

class IndexController extends Controller
{
    public function index($params)
    {
        //savoir si un utilisateur existe deja
    	$connectUser="Souhaila";
    	$message=$params;
    	//var_dump ($params);
        echo $this->twig->render('index.html', ['connectUser' =>   $connectUser]);
    }
    public function mypage($params)
    {
        $connectUser="Souhaila";
        
        echo $this->twig->render('mypage.html', ['connectUser' =>   $connectUser,'url'=>"163.172.211.49/souhaila/squelette_framework_php/bootstrap.php"]);
    }
    public function getUsers($params)
    {
        //$this->em->creatyQuery('SELECT u FROM Users u');
        //$query->getResults();
        
        echo $this->twig->render('index.html', ['connectUser' =>   $connectUser]);
    }
    public function getVilles($params)
    {
        $query = $this->em->createquery("SELECT v FROM Villes v WHERE v.id BETWEEN 1 AND 20");
        $villes = $query->getResult();
        dump($villes);
        echo $this->twig->render('ville.twig', ['villes' =>  $villes]);
    }
    public function users($params)
    {
        $connectUser="plop";
        echo $this->twig->render('users/create.twig', ['connectUser' =>   $connectUser]);
    }
       public function liste($params)
    {
        //Affiche un tableau des users
        $query = $this->em->createQuery('SELECT v FROM Villes v');
        $villes = $query->getResult();
        dump($villes);
        
        echo $this->twig->render('villes/liste.twig', ['villes'=>$villes]);
    } 
    
}