<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class TagController extends AbstractController
{
    public function indexAction(Request $request)
    {
        return $this->render('tag/index.html.twig');

    }

}