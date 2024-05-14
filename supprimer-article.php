<?php

if (!empty($_GET['id'])) {
    include './traitement_toutes_pages.php';
    include './fonctions.php';

    $bdd = connexionBDD();
    $resultat = $bdd->prepare('DELETE FROM article WHERE id = ?');
    $resultat->execute([
        $_GET['id']
    ]);

    rediriger('liste-articles.php');
}

die('Erreur 404');