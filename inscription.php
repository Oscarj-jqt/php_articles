<?php include './header.php'; ?>

<form action="inscription_traitement.php" method="post" enctype="multipart/form-data" class="m-16 shadow border rounded p-16 flex flex-col items-center gap-2">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">

    <input type="text" name="login" placeholder="Identifiant" class="border outline-none w-64 h-12" autofocus>
    <input type="password" name="password" placeholder="Mot de passe" class="border outline-none w-64 h-12">
    <input type="password" name="password_conf" placeholder="Confirmation du mot de passe" class="border outline-none w-64 h-12">
    <input type="text" name="pseudo" placeholder="Pseudo" class="border outline-none w-64 h-12">
    <input type="file" name="avatar" accept="image/*" placeholder="Image de profil" class="border outline-none w-64 h-12">
    
    <input type="submit" value="S'inscrire">
</form>

<?php include './footer.php';
