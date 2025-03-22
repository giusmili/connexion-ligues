<?php
session_start();

class Admin{
    static function admin(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         
            if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
                $email = $_POST['email'];
                $mot_de_passe = $_POST['mot_de_passe'];
        
                try {
                    
                    $pdo = new PDO('mysql:host=localhost;dbname=m2l', 'root', '', [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]);
        
                
                    $sql = "SELECT * FROM Collaborateur WHERE email = :email";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(':email', $email);
                    $statement->execute();
        
                
                    if ($statement->rowCount() > 0) {
                        $user = $statement->fetch();
        
                        # Vérification du mot de passe
                        if (password_verify($mot_de_passe, $user['mot_de_passe'])) {
                            # Stockage des informations de l'utilisateur dans la session
                            $_SESSION['user_id'] = $user['id_collaborateur'];
                            $_SESSION['user_prenom'] = $user['prenom'];
                            $_SESSION['user_est_admin'] = $user['est_admin'];
        
                            # Régénération de l'ID de session pour plus de sécurité
                           session_regenerate_id(true);
        
                            header("Location: dashboard.php"); 
                            exit();
                        } else {
                            echo "Mot de passe incorrect.";
                        }
                    } else {
                        echo "Email non reconnu.";
                    }
        
                } catch (PDOException $e) {
                    # Enregistrement de l'erreur dans un fichier de log
                    error_log("Erreur de connexion à la base de données: " . $e->getMessage());
                    echo "Une erreur est survenue. Veuillez réessayer plus tard.";
                }
            } else {
                echo "Données de formulaire manquantes.";
            }
        } 
    }
}
Admin::admin();
?>
