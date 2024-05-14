<?php

session_start();

if (empty($_SESSION) && !empty($_COOKIE['remember'])) {
    // La session est vide mais le cookie existe
    // L'utilisateur a souhaité qu'on se souvienne de lui

    include './fonction_fichier_json.php';

    $utilisateur = trouverUtilisateurGraceAID($_COOKIE['remember']);

    if ($utilisateur) {
        $_SESSION['pseudo'] = $utilisateur['pseudo'];
    } else {
        setcookie('remember', '', -1); // Je supprime le cookie qui ne fonctionne pas
    }
}

if (!empty($_COOKIE['remember'])) {
    // On "refresh" le cookie
    // = on crée le même cookie (même nom, même valeur) avec une date dans 13 mois

    setcookie('remember', $_COOKIE['remember'], time() + 395 * 24 * 3600);
}