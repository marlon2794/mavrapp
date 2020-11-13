<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Library para poder utilizar el renderizado de plantilas HTML con Twig
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// La clase debe heredad de AbstractController para que funcionen las rutas
class LuckyController extends AbstractController
{
    /**
    * @Route("/lucky/number")
    */
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}
