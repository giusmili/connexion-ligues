

# 🚀 Connexion à la base de données
1. Assurez-vous que les informations de connexion (host, dbname, username, password) sont correctes et sécurisées. Évitez d'utiliser des identifiants par défaut comme root sans mot de passe dans un environnement de production.

    ## Validation des entrées utilisateur :
2. Bien que vous utilisiez des requêtes préparées pour éviter les injections SQL, il est toujours bon de valider et de nettoyer les entrées utilisateur avant de les utiliser.

    ## Gestion des erreurs :
 3. Actuellement, les messages d'erreur sont affichés directement à l'utilisateur. Dans un environnement de production, il est préférable de ne pas exposer les détails des erreurs. Vous pouvez enregistrer les erreurs dans un fichier de log et afficher des messages génériques à l'utilisateur.

    ## Sécurité des sessions :
5.  Assurez-vous que les sessions sont correctement configurées et sécurisées sur votre serveur. Vous pouvez ajouter des options de sécurité supplémentaires pour les sessions, comme session_regenerate_id(true) après une connexion réussie.

    # Redirection après connexion :
5. Assurez-vous que la page dashboard.php existe et est accessible après une connexion réussie.

### Connexion à la BDD et insertion automatique des données

```php
try {
        # bdd connection
        $pdo = new PDO('mysql:host=localhost;dbname=m2l', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                # bdd insert to data
       $sql = "INSERT INTO collaborateur (nom, prenom, email, mot_de_passe, telephone, date_de_naissance, ville, pays, photo, est_admin)
                        VALUES (:nom, :prenom, :email, :mot_de_passe, :telephone, :date_de_naissance, :ville, :pays, :photo, :est_admin)";
            
              
        $stmt = $pdo->prepare($sql);
            
               
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
            
                # Exécution automatique de la requête avec les données
        $stmt->execute($data);
                print "<p>Données insérées avec succès.</p>";
            
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
        }

# ces instructions PDO dovent se retrouver dans une méthode de class
        
```

## Modèle de table
```SQL
CREATE TABLE `collaborateur` (
  `id_collaborateur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `pays` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `est_admin` tinyint(1) DEFAULT 0
)
```
## MCD

```cmd
Collaborateur (id_collaborateur, nom, prénom, email, mot_de_passe, téléphone, date_de_naissance, ville, pays, photo, service, est_admin)

Service (id_service, nom_service)

Relations :
- Collaborateur (service) ---< Appartient à >--- Service (id_service)
```
## Explications
    
* Collaborateur : Cette entité représente chaque utilisateur de l'intranet. Elle contient  toutes les informations personnelles et professionnelles nécessaires.
* Service : Cette entité représente les différents services de l'entreprise. Chaque collaborateur est associé à un service.
* Relations : La relation entre Collaborateur et Service est de type "plusieurs-à-un", car plusieurs collaborateurs peuvent appartenir à un même service.
