<?php
namespace monApp\core;

class Mailer {
    public static function sendUserCredentials($email, $nom, $prenom, $login, $password) {
        $to = $email;
        $subject = "Vos identifiants de connexion";
        
        $message = "Bonjour $prenom $nom,\n\n";
        $message .= "Votre compte a été créé avec succès. Voici vos identifiants de connexion :\n\n";
        $message .= "Login : $login\n";
        $message .= "Mot de passe : $password\n\n";
        $message .= "Nous vous recommandons de changer votre mot de passe lors de votre première connexion.\n\n";
        $message .= "Cordialement,\nL'équipe administrative";
        
        $headers = 'From: no-reply@speedpro.fr' . "\r\n" .
            'Reply-To: no-reply@speedpro.fr' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
        return mail($to, $subject, $message, $headers);
    }
} 