<?php

namespace monApp\controllers\pages;

use monApp\models\clients;
use monApp\core\app;
use monApp\core\tools;

class pageClientsController {
    public function index() {
        // Gestion de l'ajout de client
        if(isset($_POST['action']) && $_POST['action'] == 'addClient') {
            try {
                $client = new clients();
                
                // Définir les valeurs obligatoires
                $client->setNom_client_1($_POST['nom_client_1']);
                $client->setPrenom_client_1($_POST['prenom_client_1']);
                $client->setEmail_client_1($_POST['email_client_1']);
                $client->setTelephone_client_1($_POST['telephone_client_1']);
                $client->setRue($_POST['rue']);
                $client->setCode_postal($_POST['code_postal']);
                $client->setVille($_POST['ville']);
                $client->setPays($_POST['pays']);

                // Définir les valeurs optionnelles
                if(!empty($_POST['nom_client_2'])) {
                    $client->setNom_client_2($_POST['nom_client_2']);
                }
                if(!empty($_POST['prenom_client_2'])) {
                    $client->setPrenom_client_2($_POST['prenom_client_2']);
                }
                if(!empty($_POST['email_client_2'])) {
                    $client->setEmail_client_2($_POST['email_client_2']);
                }
                if(!empty($_POST['telephone_client_2'])) {
                    $client->setTelephone_client_2($_POST['telephone_client_2']);
                }

                $id = $client->save();
                
                if($id) {
                    app::redirection('?p=clients');
                }
                exit;
            } catch (\Exception $e) {
                app::redirection('?p=clients');
                exit;
            }
        }

        // Affichage de la page
        $clients = clients::tous();
        require "views/pages/clients.php";
    }
}

?>