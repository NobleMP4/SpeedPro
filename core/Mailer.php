<?php
namespace monApp\core;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    public static function sendUserCredentials($email, $nom, $prenom, $login, $password) {
        require 'vendor/autoload.php'; // Assurez-vous d'avoir installé PHPMailer via Composer
        
        $mail = new PHPMailer(true);
        
        try {
            // Configuration du serveur
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com'; // Serveur SMTP d'Hostinger
            $mail->SMTPAuth = true;
            $mail->Username = 'no-reply@speedpro.fr';
            $mail->Password = 'votre_mot_de_passe_email'; // À remplacer par le vrai mot de passe
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            
            // Destinataires
            $mail->setFrom('no-reply@speedpro.fr', 'SpeedPro');
            $mail->addAddress($email, "$prenom $nom");
            
            // Contenu
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = "Vos identifiants de connexion";
            $mail->Body = "
            <html>
            <head>
                <title>Vos identifiants de connexion</title>
            </head>
            <body>
                <p>Bonjour $prenom $nom,</p>
                <p>Votre compte a été créé avec succès. Voici vos identifiants de connexion :</p>
                <p><strong>Login :</strong> $login</p>
                <p><strong>Mot de passe :</strong> $password</p>
                <p>Nous vous recommandons de changer votre mot de passe lors de votre première connexion.</p>
                <p>Cordialement,<br>L'équipe administrative</p>
            </body>
            </html>";
            
            return $mail->send();
        } catch (Exception $e) {
            error_log("Erreur d'envoi d'email : {$mail->ErrorInfo}");
            return false;
        }
    }
} 