<?php

function connexionBDD(): PDO {
    return new PDO('mysql:host=localhost;dbname=blog', 'root', '');
}

function uploaderFichier(string $dossier, string $clef): string|false {
    $extension = pathinfo($_FILES[$clef]['name'], PATHINFO_EXTENSION);
    $nom = uniqid() . '.' . $extension;

    if (move_uploaded_file(
        $_FILES[$clef]['tmp_name'], // Point de départ
        $dossier . $nom // Point d'arrivée
    )) {
        return $nom;
    } else {
        return false;
    }
}

function rediriger(string $url) {
    header('location: ' . $url);
    die;
}

/**
 * Sert à renvoyer la bonne URL pour les images des articles
 * Si l'image commence par http:// ou https:// on renvoie ça
 * Sinon on renvoie articles/quelque_chose
 */
function imageArticle($article) {
    if (str_starts_with($article['image'], 'http')) {
        return $article['image'];
    } else {
        return 'articles/' . $article['image'];
    }
}