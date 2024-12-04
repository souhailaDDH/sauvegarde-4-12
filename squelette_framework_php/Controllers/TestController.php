<?php

namespace Controllers;

class TestController extends Controller
{
    public function index($params)
    {
    	$connectUser="Souhaila";
    	$message=$params;
    	var_dump ($params);
        echo $this->twig->render('index.html', ['connectUser' =>   $connectUser]);
    }
    public function myForm($params)
    {
        $connectUser="Souhaila";
        
        echo $this->twig->render('myForm.twig', ['connectUser' =>   $connectUser,'url'=>"163.172.211.49/souhaila/squelette_framework_php/bootstrap.php"]);
    }
    public function recData($params)
    {
        dump($_POST);
    }
    
    
}