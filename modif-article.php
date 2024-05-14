<?php 
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

include './header.php'; 
?>

<!-- 
Même formulaire que pour l'ajout, avec 2 différences :
    - L'action
    - On affiche les valeurs déjà existantes dans le formulaire
-->

<form action="modif-article-traitement.php?id=<?= $article['id'] ?>" method="post" enctype="multipart/form-data" class="m-16 shadow border rounded p-16 flex flex-col items-center gap-2">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type="text" name="titre" placeholder="Titre" class="border outline-none w-64 h-12" value="<?= $article['titre'] ?>">
    <textarea name="content" rows="5" placeholder="Contenu" class="border outline-none w-64 h-12"><?= $article['contenu'] ?></textarea>
    
    <img src="<?= imageArticle($article) ?>" alt="" class="max-w-48 max-h-48 object-contain">
    <input type="file" name="image" accept="image/*" placeholder="Image" class="border outline-none w-64 h-12">

    <input type="submit" value="Modifier l'article">
</form>

<?php include './footer.php';
