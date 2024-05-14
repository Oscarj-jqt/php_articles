<?php

include './traitement_toutes_pages.php';
include './fonctions.php';

/**
 * Une fonction qui renvoie un certain nombre de mots de lorem ipsum
 */
function loremIpsum(int $nbrMots): string {
    $lorem = file_get_contents('lorem.txt');
    $loremExplose = explode(' ', $lorem);
    $nbrMotsLorem = count($loremExplose);

    $depart = rand(0, $nbrMotsLorem - $nbrMots);
    $str = '';

    for ($i = $depart; $i < $nbrMots + $depart; $i++) {
        $str .= $loremExplose[$i] . ' ';
    }

    return ucfirst(trim($str));
}

$bdd = connexionBDD();
$resultat = $bdd->prepare('INSERT INTO article VALUE (NULL, :titre, :contenu, :image, CURRENT_TIMESTAMP)');

for ($i = 0; $i < 1000; $i++) {
    $t = loremIpsum(5);
    $c = loremIpsum(100);

    $resultat->execute([
        'image' => 'https://picsum.photos/1500/800?rand=' . $i,
        'titre' => $t,
        'contenu' => $c,
    ]);
}
