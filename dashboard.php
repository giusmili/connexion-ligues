<?php
    session_start();
    require_once __DIR__ . '/controller/collaborateurs.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Maison des Ligues">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <title>Connexion à l'Intranet</title>
</head>
<body>
    <header>
        <?php
        
            include_once __DIR__ .'/controller/BaseAdmin.php';
        
        ?>
    </header>
<main>
    <section class="form">
        <h2>
            Description du collaborateur
        </h2>
        <p>
        The fact is, these divisions are reckoned from noon to noon, so that there are night as well as day quarters; and as it is very seldom that ships venture close in in the dark, the chance of a pilot coming on board then is very small. However, I easily consoled myself. 
        Going down into the saloon, I saw a lecture announced.
        </p>
        <ul class ="collection-collab">
        <?php foreach ($collaborateurs as $collaborateur): ?>
              
            <li class="picture">
                        <?php if (!empty($collaborateur['photo'])): ?>
                            <img src="<?= htmlspecialchars($collaborateur['photo']) ?>" alt="Photo">
                        <?php else: ?>
                            <span>Aucune photo</span>
                        <?php endif; ?>
                    </li>
                    <li>Nom : <?= htmlspecialchars($collaborateur['nom']) ?></li>
                    <li>Prénom : <?= htmlspecialchars($collaborateur['prenom']) ?></li>
                    <li>Email : <?= htmlspecialchars($collaborateur['email']) ?></li>
                    <li>Téléphone : <?= htmlspecialchars($collaborateur['telephone']) ?></li>
                    <li>Ville : <?= htmlspecialchars($collaborateur['ville']) ?></li>
                    <li>Pays : <?= htmlspecialchars($collaborateur['pays']) ?></li>
                   
                    <li>Admin : <?= ((int)$collaborateur['est_admin']) ? '✅' : '❌' ?></li>
                
            <?php endforeach; ?>
            </ul>
    </section>
</main>
<footer>
    <p>
        &copy; - M2L - 2025
    </p>
</footer>
</body>
</html>
