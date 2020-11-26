<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {

        return $this->render("home.html.twig");
    }


    /**
     * @Route("/localisation", name="localisation")
     */
    public function localisation()
    {
        return $this->render("localisation.html.twig");
    }

    /**
     * @Route("/galerie/showMatevulu", name="galerie_showMatevulu")
     */
    public function showMatevulu(){
        return $this->render('galeries/galerie_matevulu.html.twig');
    }
    /**
     * @Route("/galerie/showFreediving", name="galerie_showFreediving")
     */
    public function showFreediving(){
        return $this->render('galeries/galerie_freediving.html.twig');
    }
    /**
     * @Route("/galerie/showFlaoa", name="galerie_showFlaoa")
     */
    public function showFlaoa(){
        return $this->render('galeries/galerie_flaoa.html.twig');
    }
    /**
     * @Route("/galerie/showPidjin", name="galerie_showPidjin")
     */
    public function showPidjin(){
        return $this->render('galeries/galerie_pidjin.html.twig');
    }
    /**
     * @Route("/galerie/showSanbij", name="galerie_showSanbij")
     */
    public function showSanbij(){
        return $this->render('galeries/galerie_sanbij.html.twig');
    }






}
