<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Plongee;
use App\Entity\ReservationPlongee;
use App\Form\ClientResaType;
use App\Form\ClientType;
use App\Form\ReservationPlongeeType;
use App\Notification\ContactNotification;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ReservationPlongeeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ReservationPlongee::class;
    }

    /**
     * @Route("/apnee/{id}/reservation", name="apnee_reservation", requirements={"id": "\d+"})
     * @param Plongee $plongee
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function reservation(Plongee $plongee, Request $request, ContactNotification $notification)
    {
        //Création du client et de la réservation
        $client = new Client();
        $reservation = new ReservationPlongee();

        $plongee->getId();


        //Début des dates à la date du jour
        $reservation->setDateDebut(new\DateTime('now'));
        $reservation->setDateFin(new\DateTime('now'));

        //Création des deux formulaires
        $clientForm = $this->createForm(ClientResaType::class, $client);
        $reservationForm = $this->createForm(ReservationPlongeeType::class, $reservation);


        //Envoi des deux requêtes
        $reservationForm->handleRequest($request);
        $clientForm->handleRequest($request);


        if ($reservationForm->isSubmitted() && $reservationForm->isValid() && $clientForm->isSubmitted() && $clientForm->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $reservation->setPremiereValidation(true);
            $reservation->setValidationDefinitive(false);

            $reservation->addClient($client);
            $plongee->addReservation($reservation);


            $em->persist($client);

            $notification->notifyResaApnee($client, $reservation);

            $em->flush();

            $this->addFlash('success', 'Votre demande a bien été prise en compte !');
            //return $this->redirectToRoute("home");
        }

        return $this->render('apnee_reservation.html.twig', array('form1' => $reservationForm->createView(), 'form2' => $clientForm->createView(), 'plongee' => $plongee
            )
        );

    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Réservations apnées')
            ->setDateTimeFormat('short', 'short');

    }

    public function configureFields(string $pageName): iterable
    {
        return parent::configureFields($pageName);
    }

}
