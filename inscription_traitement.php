<?php
include './traitement_toutes_pages.php';

if (
    !empty($_POST['login'])
    && !empty($_POST['password'])
    && !empty($_POST['password_conf'])
    && $_POST['password'] === $_POST['password_conf']
    && !empty($_POST['pseudo'])

    && !empty($_FILES['avatar'])
    && $_FILES['avatar']['size'] <= 1_000_000
    && $_FILES['avatar']['error'] === 0
    && str_starts_with($_FILES['avatar']['type'], 'image/')
) {

    include './fonctions.php';
    $nom = uploaderFichier(__DIR__ . '/avatars/', 'avatar');


    if ($nom) {
        $bdd = connexionBDD();

        $resultat = $bdd->prepare('INSERT INTO user VALUE (NULL, :pseudo, :login, :psw, :avatar)');
        $resultat->execute([
            'avatar' => $nom,
            'pseudo' => $_POST['pseudo'],
            'psw' => $_POST['password'],
            'login' => $_POST['login'],
        ]);
    }

    rediriger('connexion.php');
} else {
    die('Nope');
}
