<?php

namespace Controllers;

use Users;

class UserController extends Controller
{
    public function liste($params)
    {
        //Affiche un tableau des users
        $query = $this->em->createQuery('SELECT u FROM Users u');
        $users = $query->getResult();
        dump($users);
        
        echo $this->twig->render('users/liste.twig', ['users'=>$users]);
    } 
    
    public function create($params)
    {
        // Permet d'afficher un formulaire de création
        $qb = $this->em->createQueryBuilder();
        $qb->select('v')
           ->from('Villes', 'v')
           
        ;
        $villes = $qb->getQuery()->getResult();
        echo $this->twig->render('users/create.twig', ['villes'=>$villes]);
    }
    
    public function insert($params)
    {
        //Insert un user dans la BDD
        $ville = $this->em->find('Villes',$_POST['ville_id']);
        dump($_POST);
        $user= new Users();
        $user->setNom($_POST['nom']);
        $user->setPrenom($_POST['prenom']);
        
        $user->setVille($ville);
        dump($user);
        $this->em->persist($user);
        $this->em->flush();
    }  
    public function edit($params)
    {
        dump($id=$_GET['id']);
        $user=$this->em->find('Users',$id);
        if ($user){
            dump($user);
        }
        else {
            echo "Erreur, cette id n'existe pas";
        }
    }
    public function update($params)
    {
        // Met à jour un utilisateur dans la BDD
        $id = $_POST['id'];
        $user = $this->em->find('Users', $id);
        if ($user) {
            $ville = $this->em->find('Villes', $_POST['ville_id']);
            $user->setNom($_POST['nom']);
            $user->setPrenom($_POST['prenom']);
            $user->setVille($ville);
            $this->em->flush();
        } else {
            echo "Erreur, cet ID n'existe pas";
        }
    }
    public function delete($params)
    {
        // Supprime un utilisateur de la BDD
        $id = $_GET['id'];
        $user = $this->em->find('Users', $id);
        if ($user) {
            $this->em->remove($user);
            $this->em->flush();
        } else {
            echo "Erreur, cet ID n'existe pas";
        }
    }
    
}