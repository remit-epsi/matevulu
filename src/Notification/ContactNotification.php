<?php


namespace App\Notification;



use App\Entity\Client;
use App\Entity\ReservationBungalow;
use App\Entity\ReservationPlongee;
use Twig\Environment;

class ContactNotification
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {

        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function notify (Client $client, $demande) {


        $message = (new \Swift_Message('Client : ' . $client->getNom().' ' .$client->getPrenom()))
            ->setFrom('remi.treussart@gmail.com')
            ->setTo('remi.treussart@gmail.com')
            ->setReplyTo($client->getMail())
            ->setBody($this->renderer->render('emails/contact_mail.html.twig', [
                'client' => $client,
                'demande'=>$demande
            ]), 'text/html');
        $this->mailer->send($message);
    }



    public function notifyResaBungalow (Client $client, ReservationBungalow $reservation) {



        $message = (new \Swift_Message('Client : ' . $client->getNom().' ' .$client->getPrenom()))
            ->setFrom('remi.treussart@gmail.com')
            ->setTo('remi.treussart@gmail.com')
            ->setReplyTo($client->getMail())
            ->setBody($this->renderer->render('emails/resa_bungalow_mail.html.twig', [
                'client' => $client,
                'reservation' => $reservation
            ]), 'text/html');
        $this->mailer->send($message);
    }

    public function notifyResaApnee (Client $client, ReservationPlongee $reservation) {



        $message = (new \Swift_Message('Client : ' . $client->getNom().' ' .$client->getPrenom()))
            ->setFrom('remi.treussart@gmail.com')
            ->setTo('remi.treussart@gmail.com')
            ->setReplyTo($client->getMail())
            ->setBody($this->renderer->render('emails/resa_apnee_mail.html.twig', [
                'client' => $client,
                'reservation' => $reservation
            ]), 'text/html');
        $this->mailer->send($message);
    }
}