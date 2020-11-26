<?php

namespace App\Controller;


use App\Entity\Client;
use App\Form\ClientType;
use App\Notification\ContactNotification;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function add(EntityManagerInterface $em, Request $request, ContactNotification $notification) : Response  {
        $client = new Client();
        $demande=null;


        //Création du formulaire
        $clientForm = $this->createForm(ClientType::class, $client);
        $clientForm->get('demande')->setData($demande);

        //Envoi de la requête
        $clientForm->handleRequest($request);


        if ($clientForm->isSubmitted() && $clientForm->isValid()) {

            $em->persist($client);
            $demande = $clientForm->get('demande')->getData();
            $notification ->notify($client,$demande);

            $em->flush();

            //Ajoute un flash à la réussite
            $this->addFlash('success', 'Votre demande a bien été prise en compte');
           // return $this->redirectToRoute("home");


        }

        return $this->render('client/contact.html.twig', [
            'clientForm' => $clientForm->createView(),
        ]);


    }
}

