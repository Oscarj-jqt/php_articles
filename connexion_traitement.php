<?php

include './traitement_toutes_pages.php';
include './fonctions.php';

if (
    !empty($_POST['login'])
    && !empty($_POST['password'])
) {

    $bdd = connexionBDD();

    $resultat = $bdd->prepare('SELECT * FROM user WHERE login = :log AND password = :psw');
    $resultat->execute([
        'psw' => $_POST['password'],
        'log' => $_POST['login'],
    ]);

    $utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        $_SESSION = $utilisateur;

        if (isset($_POST['remember'])) {
            // L'utilisateur veut qu'on se souvienne de lui
            // On crée un cookie avec une info qui permet de le reconnaître

            setcookie('remember', $utilisateur['id'], time() + 395 * 24 * 3600); // Dure 13 mois
        }

        rediriger('index.php');
    }
}


die('Mauvais identifiant ou mot de passe.');
