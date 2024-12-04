<?php

namespace Controllers;

use Users;

class LoginController extends Controller
{
    const MAX_ATTEMPTS = 3;
    const BLOCK_TIME = 600;

    public function create($params)
    {
        echo $this->twig->render('login/inscription.twig', []);
    }

    public function register($params)
    {
        $user = new Users();
        //dump($_POST);
        $user->setNom($_POST['nom']);
        $user->setPrenom($_POST['prenom']);
        $user->setIdent($_POST['ident']);
        $user->setPassword(password_hash($_POST['password'], PASSWORD_ARGON2I));
        $this->em->persist($user);
        $this->em->flush();
        $this->login($params);
    }

    public function login($params)
    {
        // Affiche le formulaire de login
        echo $this->twig->render('login/login.twig', []);
    }

    public function verifier($params)
    {
        session_start();

        if (!isset($_SESSION['attempts'])) {
            $_SESSION['attempts'] = 0;
            $_SESSION['block_time'] = 0;
        }

        $currentTime = time();
        if ($_SESSION['attempts'] >= self::MAX_ATTEMPTS && $currentTime - $_SESSION['block_time'] < self::BLOCK_TIME) {
            $remainingTime = self::BLOCK_TIME - ($currentTime - $_SESSION['block_time']);
            echo $this->twig->render('login/mdp.twig', ['message' => "Trop de tentatives échouées. Veuillez réessayer dans " . ceil($remainingTime / 60) . " minutes."]);
            return;
        }

        $_SESSION['loged'] = true;
        $message = "You are connected";
        $qb = $this->em->createQueryBuilder();
        $qb->select('u')
            ->from('Users', 'u')
            ->where('u.ident = ?1')
            ->setParameter(1, $_POST['ident']);
        $user = $qb->getQuery()->getOneOrNullResult();
        dump($user);

        if (!$user) {
            $message = "This user doesn't exist, try again";
            $_SESSION['loged'] = false;
        } else if (!password_verify($_POST['password'], $user->getPassword())) {
            $message = "Mot de passe incorrect";
            $_SESSION['loged'] = false;
            $_SESSION['attempts'] += 1;
            if ($_SESSION['attempts'] >= self::MAX_ATTEMPTS) {
                $_SESSION['block_time'] = $currentTime;
            }
        } else {
            // Successful login
            $_SESSION['attempts'] = 0;
            $_SESSION['block_time'] = 0;
        }

        dump($_SESSION);

        echo $this->twig->render('login/mdp.twig', ['message' => $message]);
    }
}
