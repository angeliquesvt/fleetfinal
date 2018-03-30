<?php

/*
 * Test si je reçois des POST
 */

if (isset($_REQUEST)) {
    /**
     * Récuparation de variables
     */
    $prenom = $_REQUEST['prenom'];
    $nom = $_REQUEST['nom'];
    $poste = $_REQUEST['poste'];
    $email = $_REQUEST['email'];
    $textarea = $_REQUEST['message'];
    $usermail = $_REQUEST['usermail'];

    $sender = 'ancre.contact@gmail.com';
    /**
     * Appel à la librairie permettant d'envoyer des mails
     */
    require_once realpath('swiftmailer/lib/swift_required.php');
    /**
     * Configure l'envoie de mail
     *  1 - SMTP
     *  2 - Port (587 => tls / 465 => ssl)
     *  3 - Type (tls / ssl)
     *  4 - Identifiant + mot de passe
     */
    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUsername($sender)
            ->setPassword('fleetancre2018');
    /*
     * Création de ton mail
     */
    $message = Swift_Message::newInstance()
            ->setSubject("Mon sujet")
            ->setFrom(array($sender))
            ->setTo(array("$usermail"))
            ->setBody("{$prenom} {$nom} souhaite entré en contact avec vous pour le poste: {$poste}<br/>Mail: {$email} <br/><br/>Il vous a laissé comme message:<br/><br/>{$textarea}", 'text/html');
    /**
     * Envoi de ton email
     */
    Swift_Mailer::newInstance($transport)->send($message);
    echo true;
}
