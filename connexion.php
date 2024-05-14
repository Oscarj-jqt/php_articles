<?php include './header.php'; ?>

<form action="connexion_traitement.php" method="post" class="m-16 shadow border rounded p-16 flex flex-col items-center gap-2">
    <input type="text" name="login" placeholder="Identifiant" class="border outline-none w-64 h-12" autofocus>
    <input type="password" name="password" placeholder="Mot de passe" class="border outline-none w-64 h-12">

    <label for="remember">
        <input type="checkbox" name="remember" id="remember" value="true">
        Se souvenir de moi
    </label>

    <input type="submit" value="Se connecter">
</form>

<?php include './footer.php';
