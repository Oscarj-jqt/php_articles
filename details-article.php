<?php 
include './fonctions.php';

if (empty($_GET['id'])) {
    // On a besoin de l'ID pour afficher un article donc on vérifie
    die('Erreur 404');
}

$bdd = connexionBDD();
$stmt = $bdd->prepare('SELECT * FROM article WHERE id = ?');
$stmt->execute([$_GET['id']]);

$article = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($article)) {
    // On a besoin que l'article existe avant de l'afficher' donc on le vérifie
    die('Erreur 404');
}

include './header.php'; 
?>

<h1 class="text-center font-bold text-2xl"><?= $article['titre'] ?></h1>

<img src="<?= imageArticle($article) ?>" alt="" class="w-full max-h-96 object-contain">

<p class="px-12 py-8">
    <?=$article['contenu'] ?>
</p>


<?php include './footer.php';
