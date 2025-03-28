<?php 

namespace monApp\controllers\pages;
use monApp\core\app;
use monApp\core\tools;
use monApp\core\Mailer;
use monApp\models\user;
use PDO;

class pageUtilisateursController {
    public function index() {
        // Si on reçoit des données POST pour l'ajout d'un utilisateur
        if(isset($_POST['action']) && $_POST['action'] === 'addUser') {
            try {
                $nom = trim($_POST['nom']);
                $prenom = trim($_POST['prenom']);
                $email = trim($_POST['email']);
                
                // Génération du login : prenom_p01 (p = première lettre du nom)
                $login_base = strtolower($prenom . "_" . substr($nom, 0, 1));
                $counter = 1;
                $login = $login_base . "01";

                // Vérification si le login existe avec une limite de tentatives
                $maxAttempts = 99;
                while ($counter <= $maxAttempts) {
                    $sql = "SELECT id_user FROM user WHERE login_user = ? LIMIT 1";
                    $result = app::$db->prepare($sql, [$login], "monApp\\models\\user");
                    
                    if (empty($result)) {
                        break; // Login disponible
                    }
                    
                    $counter++;
                    $login = $login_base . str_pad($counter, 2, '0', STR_PAD_LEFT);
                }

                if ($counter > $maxAttempts) {
                    throw new \Exception("Impossible de générer un login unique");
                }

                // Génération d'un mot de passe simple : Prenom123!
                $initial_password = ucfirst(strtolower($prenom)) . "123!";

                $user = new user();
                
                // Génération d'un ID aléatoire entre 1 et 99999
                $maxIdAttempts = 10;
                $idAttempt = 0;
                do {
                    $randomId = rand(1, 99999);
                    $sql = "SELECT id_user FROM user WHERE id_user = ? LIMIT 1";
                    $result = app::$db->prepare($sql, [$randomId], "monApp\\models\\user");
                    $exists = !empty($result);
                    $idAttempt++;

                    if ($idAttempt >= $maxIdAttempts) {
                        throw new \Exception("Impossible de générer un ID unique");
                    }
                } while($exists);

                // Configuration de l'utilisateur
                $user->setId_user($randomId);
                $user->setNom_user($nom);
                $user->setPrenom_user($prenom);
                $user->setLogin_user($login);
                $user->setEmail_user($email);
                $user->setMdp_user(password_hash($initial_password, PASSWORD_DEFAULT));
                $user->setId_role_user($_POST['role']);

                // Ajout en base de données
                $sql = "INSERT INTO user (id_user, nom_user, prenom_user, login_user, email_user, mdp_user, id_role_user) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
                $result = app::$db->prepare($sql, [
                    $user->getId_user(),
                    $user->getNom_user(),
                    $user->getPrenom_user(),
                    $user->getLogin_user(),
                    $user->getEmail_user(),
                    $user->getMdp_user(),
                    $user->getId_role_user()
                ], "monApp\\models\\user");

                if($result) {
                    // Envoi des identifiants par email
                    $mailSent = Mailer::sendUserCredentials(
                        $email,
                        $nom,
                        $prenom,
                        $login,
                        $initial_password
                    );

                    $_SESSION['success_message'] = "Utilisateur créé avec succès !";
                    if ($mailSent) {
                        $_SESSION['success_message'] .= " Les identifiants ont été envoyés par email.";
                    } else {
                        error_log("Échec de l'envoi du mail pour l'utilisateur : $login");
                        $_SESSION['warning_message'] = "L'envoi de l'email a échoué.";
                    }
                    
                    $_SESSION['new_user_login'] = $login;
                    $_SESSION['new_user_password'] = $initial_password;
                    header('Location: ?p=utilisateurs');
                    exit();
                } else {
                    header('Location: ?p=utilisateurs&error=1');
                    exit();
                }
            } catch(\Exception $e) {
                header('Location: ?p=utilisateurs&error=2');
                exit();
            }
        }

        require "views/pages/utilisateurs.php";
    }
}

?>