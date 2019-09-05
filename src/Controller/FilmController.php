<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    /**
     * @Route("/films/index", name="films_index", methods={"GET"})
     */
    public function indexAction(Request $request)
    {
        return $this->render('templates/film/index.html.twig');

    }


}