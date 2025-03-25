<?php
require_once 'connexion_isAdmin.php';


try {
    $stmt = $pdo->query("
        SELECT 
            id_collaborateur, 
            nom, 
            prenom, 
            email, 
            telephone, 
            ville, 
            pays, 
            photo, 
            CAST(est_admin AS UNSIGNED) AS est_admin 
        FROM collaborateur 
        ORDER BY nom ASC
    ");
    $collaborateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération : " . $e->getMessage());
}

