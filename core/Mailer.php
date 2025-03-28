<?php
namespace monApp\core;

class Mailer {
    public static function sendUserCredentials($email, $nom, $prenom, $login, $password) {
        $to = $email;
        $subject = "Vos identifiants de connexion";
        
        // Création du message au format HTML
        $message = "
        <html>
        <head>
            <title>Vos identifiants de connexion</title>
        </head>
        <body>
            <p>Bonjour $prenom $nom,</p>
            <p>Votre compte a été créé avec succès. Voici vos identifiants de connexion :</p>
            <p><strong>Login :</strong> $login<br>
            <strong>Mot de passe :</strong> $password</p>
            <p>Nous vous recommandons de changer votre mot de passe lors de votre première connexion.</p>
            <p>Cordialement,<br>L'équipe administrative</p>
        </body>
        </html>";
        
        // En-têtes pour l'envoi en HTML et configuration SMTP
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: SpeedPro <noreply@edperso.fr>\r\n";
        $headers .= "Reply-To: noreply@edperso.fr\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        
        // Configuration des paramètres additionnels pour l'envoi SMTP
        $parameters = "-f noreply@edperso.fr";
        
        // Log des informations d'envoi
        error_log("Tentative d'envoi de mail à : " . $to);
        error_log("Headers : " . print_r($headers, true));
        error_log("Message : " . $message);
        
        // Envoi du mail avec les paramètres SMTP
        $result = mail($to, $subject, $message, $headers, $parameters);
        
        // Log du résultat
        error_log("Résultat de l'envoi : " . ($result ? "Succès" : "Échec"));
        
        if (!$result) {
            error_log("Erreur d'envoi de mail - Erreur PHP : " . error_get_last()['message']);
        }
        
        return $result;
    }
} 