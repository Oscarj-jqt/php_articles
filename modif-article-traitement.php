<?php
include './traitement_toutes_pages.php';
include './fonctions.php';

if (empty($_GET['id'])) {
    // On a besoin de l'ID pour modifier un article donc on vérifie
    die('Erreur 404');
}

$bdd = connexionBDD();
$stmt = $bdd->prepare('SELECT * FROM article WHERE id = ?');
$stmt->execute([$_GET['id']]);

$article = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($article)) {
    // On a besoin que l'article existe avant de le modifier donc on le vérifie
    die('Erreur 404');
}

if (
    !empty($_POST['titre'])
    && !empty($_POST['content'])
) {
    // L'upload d'un fichier à la modification n'est pas obligatoire
    // Si le fichier est uploadé il change
    // Sinon on garde l'ancien
    if (
        !empty($_FILES['image'])
        && $_FILES['image']['size'] <= 1_000_000
        && $_FILES['image']['error'] === 0
        && str_starts_with($_FILES['image']['type'], 'image/')
        && $nom = uploaderFichier(__DIR__ . '/articles/', 'image')
    ) {
        if (is_file('articles/' . $article['image'])) {
            // On supprime l'ancienne image de l'article
            unlink('articles/' . $article['image']);
        }
    } else {
        $nom = $article['image'];
    }

    $resultat = $bdd->prepare('UPDATE article set titre = :titre, contenu = :contenu, image = :image WHERE id = :id');
    $resultat->execute([
        'id' => $article['id'],
        'image' => $nom,
        'titre' => $_POST['titre'],
        'contenu' => $_POST['content'],
    ]);

    rediriger('liste-articles.php');
}

die('Formulaire mal rempli');
