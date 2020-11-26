<?php

namespace App\Controller;


use App\Entity\Plongee;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use Symfony\Component\Routing\Annotation\Route;

class PlongeeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plongee::class;
    }

    /**
     * @Route("/apnee", name="apnee_list")
     */
    public function list()
    {
        $plongeeRepo=$this->getDoctrine()->getRepository(Plongee::class);
        $plongees = $plongeeRepo->findBy([],["id"=>"ASC"],30);
        return $this->render('apnee.html.twig',['plongees'=>$plongees]);
    }


}
