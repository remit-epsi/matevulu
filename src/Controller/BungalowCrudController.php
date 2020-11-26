<?php

namespace App\Controller;

use App\Entity\Bungalow;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Routing\Annotation\Route;

class BungalowCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bungalow::class;
    }


    /**
     * @Route("/bungalow", name="bungalow")
     */
    public function bungalow()
    {
        $bungalowRepo = $this->getDoctrine()->getRepository(Bungalow::class);
        $bungalows = $bungalowRepo->findBy([],["id"=>"ASC"],30);
        return $this->render("bungalows.html.twig",['bungalows'=>$bungalows]);
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
