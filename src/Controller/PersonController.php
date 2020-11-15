<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends AbstractController
{
    /**
     * @Route("/person", name="person")
     */
    public function index(): Response
    {
        return $this->render('person/index.html.twig', [
            'controller_name' => 'Person Controller',
        ]);
    }
}
