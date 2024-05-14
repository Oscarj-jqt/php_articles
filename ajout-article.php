<?php include './header.php'; ?>

<form action="ajout-article-traitement.php" method="post" enctype="multipart/form-data" class="m-16 shadow border rounded p-16 flex flex-col items-center gap-2">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type="text" name="titre" placeholder="Titre" class="border outline-none w-64 h-12">
    <textarea name="content" rows="5" placeholder="Contenu" class="border outline-none w-64 h-12"></textarea>
    <input type="file" name="image" accept="image/*" placeholder="Image" class="border outline-none w-64 h-12">

    <input type="submit" value="Créer l'article">
</form>

<?php include './footer.php';
