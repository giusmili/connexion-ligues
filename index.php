
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Maison des Ligues">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>Connexion à l'Intranet</title>
</head>
<body>
    <header>
        <h1>Connexion à l'Intranet</h1>
    </header>
<main>
    <div class="form" role="region" aria-labelledby="formulaire">
        <fieldset>
            <legend><span aria-hidden="true">🔒</span> Connexion admin</legend>
            <form id="formulaire" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required placeholder="email">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required placeholder="mot de passe">
                <input type="submit" value="Se connecter">
            </form>
        </fieldset>
        <?php

             include_once __DIR__ .'/controller/BaseController.php';
             ?>

    </div>
</main>
<footer>
    <p>
        &copy; - M2L - 2025
    </p>
</footer>
</body>
</html>
