<?php

namespace App\Controller;

use App\Entity\Bungalow;
use App\Entity\Client;
use App\Entity\Plongee;
use App\Entity\ReservationBungalow;
use App\Entity\ReservationPlongee;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(ReservationBungalowCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Matevulu Admin')
            ->setFaviconPath('img/favicon.png');
    }

    public function configureMenuItems(): iterable
    {
        return[
            MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),
            MenuItem::section('Reservations Bungalows'),
            MenuItem::linkToCrud('Les réservations','fa fa-tags', ReservationBungalow::class),
            MenuItem::linkToCrud('Bungalow','fa fa-tags', Bungalow::class),
            MenuItem::section('Reservations Apnées'),
            MenuItem::linkToCrud('Les réservations','fa fa-tags', ReservationPlongee::class),
            MenuItem::linkToCrud('Apnée','fa fa-tags', Plongee::class),
            

        ];

    }



}
