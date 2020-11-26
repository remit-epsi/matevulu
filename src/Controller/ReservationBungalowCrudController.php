<?php

namespace App\Controller;

use App\Entity\Bungalow;
use App\Entity\Client;
use App\Entity\ReservationBungalow;
use App\Form\ClientResaType;
use App\Form\ClientType;
use App\Form\ReservationBungalowType;
use App\Form\ReservationPlongeeType;
use App\Notification\ContactNotification;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationBungalowCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ReservationBungalow::class;
    }

    /**
     * @Route("/bungalow/{id}/reservation", name="bungalow_reservation", requirements={"id": "\d+"})
     * @param Bungalow $bungalow
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function reservation(Bungalow $bungalow, Request $request, ContactNotification $notification)
    {
        //Création du client et de la réservation
        $client = new Client();
        $reservation = new ReservationBungalow();

        $bungalow->getId();

        $reservation->setDateDebut(new\DateTime('now'));
        $reservation->setDateFin(new\DateTime('now'));

        //Création des deux formulaires
        $clientForm = $this->createForm(ClientResaType::class, $client);
        $reservationForm = $this->createForm(ReservationBungalowType::class, $reservation);

        //Envoi des deux requêtes
        $reservationForm->handleRequest($request);
        $clientForm->handleRequest($request);


        if ($reservationForm->isSubmitted() && $reservationForm->isValid() && $clientForm->isSubmitted() && $clientForm->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $reservation->setPremiereValidation(true);
            $reservation->setValidationDefinitive(false);


            $bungalow->addReservation($reservation);
            $client->addReservationsBungalow($reservation);

            $em->persist($client);
            $em->persist($reservation);

            $notification->notifyResaBungalow($client, $reservation);

            $em->flush();

            $this->addFlash('success', 'Votre demande a bien été prise en compte !');
            //return $this->redirectToRoute("home");
        }

        return $this->render('bungalows_reservation.html.twig', array('form1' => $reservationForm->createView(),
                'form2' => $clientForm->createView(), 'bungalow' => $bungalow
            )
        );

    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDateTimeFormat('short', 'none');
    }

}
