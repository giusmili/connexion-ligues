<?php
      if (isset($_SESSION['user_prenom'])) {
        $user_prenom = htmlspecialchars($_SESSION['user_prenom']);
        echo "<h1>Dashboard : bonjour, $user_prenom! </h1>";

        if (isset($_SESSION['user_est_admin'])) {
            echo "<p>Vous êtes connecté en tant qu'administrateur.</p>";
        }
    } else {
        # Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
        header("Location: login.php");
        exit();
    }