<?php
    class Bdd{
        static function user(){
            try {
                # bdd connection
                $pdo = new PDO('mysql:host=localhost;dbname=m2l', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                 # bdd insert to data
                $sql = "INSERT INTO collaborateur (nom, prenom, email, mot_de_passe, telephone, date_de_naissance, ville, pays, photo, est_admin)
                        VALUES (:nom, :prenom, :email, :mot_de_passe, :telephone, :date_de_naissance, :ville, :pays, :photo, :est_admin)";
            
              
                $req = $pdo->prepare($sql); # requete préparé
            
               
                $data = [
                    'nom' => 'Doe',
                    'prenom' => 'John',
                    'email' => 'john.doe@example.com',
                    'mot_de_passe' => password_hash(12345, PASSWORD_DEFAULT),
                    'telephone' => '0123456789',
                    'date_de_naissance' => '1990-01-01',
                    'ville' => 'Paris',
                    'pays' => 'France',
                    'photo' => 'http://example.com/photo.jpg',
                    'est_admin' => false
                ];
            
                # Exécution de la requête avec les données
                $req->execute($data);
                print "<p>Données insérées avec succès.</p>";
            
            } catch (PDOException $e) {
                print "Erreur(s) : " . $e->getMessage();
            }
        }
    }

    Bdd::user();
?>
