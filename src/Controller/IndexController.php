<?php

namespace App\Controller;

use App\Repository\FilmRepositoryInterface;
use App\Repository\TagRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(
        FilmRepositoryInterface $filmRepository,
        TagRepositoryInterface $tagRepository): Response
    {
        return $this->render('film/index.html.twig', [
            'films' => $filmRepository->findAll(),
            'tags'  => $tagRepository->findAll(),
        ]);
    }
}
