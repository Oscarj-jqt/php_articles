<?php
include './header.php';
include './fonctions.php';

/**
 * BONUS : 
 * 
 * On fait une pagination
 * 
 * On compte donc 15 articles par pages
 * Et on ne prend que les articles de la page actuelle
 */

$page = intval($_GET['page'] ?? 1); // Par défaut on est sur la page 1

$bdd = connexionBDD();

// Ici je concatène du SQL parce que je sais que c'est un nombre (!!)
$resultat = $bdd->query('SELECT * FROM article LIMIT 15 OFFSET ' . (($page - 1) * 15));  // On en saute ($page - 1) * 20 (si on est sur la page 2, on en saute 20)

$articles = $resultat->fetchAll(PDO::FETCH_ASSOC);

echo '<div class="flex gap-8 m-8 items-stretch justify-center flex-wrap">';

foreach ($articles as $a) { ?>
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full" src="<?= imageArticle($a) ?>" alt="">
        <div class="px-6 py-4">
            <h2 class="font-bold text-xl mb-2"><?= $a['titre'] ?></h2>
            <p class="text-gray-700 text-base">
                <?= substr($a['contenu'], 0, 150) ?>...
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><?= date_create($a['date'])->format('\L\e d/m/Y à H\hi') ?></span>
        </div>

        <p class="flex gap-4 justify-center items-center m-2">
            <a href="details-article.php?id=<?= $a['id'] ?>" class="bg-blue-500 text-white rounded w-10 h-10 flex justify-center items-center">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </a>

            <a href="modif-article.php?id=<?= $a['id'] ?>" class="bg-yellow-500 text-white rounded w-10 h-10 flex justify-center items-center">
                <i class="fa fa-pencil" aria-hidden="true"></i>
            </a>

            <a href="supprimer-article.php?id=<?= $a['id'] ?>" class="bg-red-500 text-white rounded w-10 h-10 flex justify-center items-center" onclick="return confirm('Êtes-vous sûr ?')">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </p>
    </div>
<?php }
echo '</div>';

/**
 * On affiche la pagination
 */
if ($page > 1) {
    $pagePrev = $page - 1;
} else {
    $pagePrev = false;
}

$maxArticles = $bdd->query('SELECT COUNT(id) FROM article')
    ->fetch()[0]; // On compte le nombre d'articles

if ($page < $maxArticles / 20) {
    $pageNext = $page + 1;
} else {
    $pageNext = false;
}

echo '<div class="flex justify-around">';
if ($pagePrev) {
    echo '<a href="liste-articles.php?page='.$pagePrev.'" title="Page précédente" class="rounded bg-blue-500 text-white p-4">&lt;&lt;&lt;</a>';
}

if ($pageNext) {
    echo '<a href="liste-articles.php?page='.$pageNext.'" title="Page suivante" class="rounded bg-blue-500 text-white p-4">&gt;&gt;&gt;</a>';
}
echo '</div>';

include './footer.php';
