<?php include './traitement_toutes_pages.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="flex justify-around gap-8 items-center text-gray-100 bg-gray-900 p-8">

        <a href="index.php">Accueil</a>
        <a href="about.php">A propos</a>
        <a href="liste-articles.php">Les articles</a>
        <a href="ajout-article.php">Ajouter un article</a>

        <?php if (!empty($_SESSION['pseudo'])) : ?>
            <a href="deconnexion.php">Déconnexion</a>
            <p class="flex items-center">
                Bonjour, <?= $_SESSION['pseudo'] ?>

                <?php if (!empty($_SESSION['avatar'])) : ?>
                    <img class="rounded-full w-12 h-12 ml-4" src="avatars/<?= $_SESSION['avatar'] ?>" alt="">
                <?php endif; ?>
            </p>

        <?php else : ?>
            <a href="connexion.php">Connexion</a>
            <a href="inscription.php">Inscription</a>
        <?php endif; ?>
    </nav>