<?php
      if (isset($_SESSION['user_prenom'])) {
        $user_prenom = htmlspecialchars($_SESSION['user_prenom']);
        echo "<h1>Dashboard : bonjour, $user_prenom! </h1>";

        if (isset($_SESSION['user_est_admin'])) {
            echo "<p><small>Vous êtes connecté en tant qu'administrateur.</small></p>";
        }
    } else {
        # Redirigez la personne vers la page de connexion s'il n'est pas connecté
        header("Location: index.php"); 
        exit();
    }