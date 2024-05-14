<?php
include './traitement_toutes_pages.php';

if (
    !empty($_POST['titre'])
    && !empty($_POST['content'])

    && !empty($_FILES['image'])
    && $_FILES['image']['size'] <= 1_000_000
    && $_FILES['image']['error'] === 0
    && str_starts_with($_FILES['image']['type'], 'image/')
) {
    include './fonctions.php';
    $nom = uploaderFichier(__DIR__ . '/articles/', 'image');

    if ($nom) {
        $bdd = connexionBDD();

        $resultat = $bdd->prepare('INSERT INTO article VALUE (NULL, :titre, :contenu, :image, CURRENT_TIMESTAMP)');
        $resultat->execute([
            'image' => $nom,
            'titre' => $_POST['titre'],
            'contenu' => $_POST['content'],
        ]);
        
        rediriger('liste-articles.php');
    }
}

die('Formulaire mal rempli');