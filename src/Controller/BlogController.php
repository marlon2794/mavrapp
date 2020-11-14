<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    // Esta configuración define una ruta llamada blog_list que coincide 
    // cuando el usuario solicita la /blog URL. 
    // Cuando ocurre la coincidencia, la aplicación ejecuta el list()método de la BlogControllerclase.
    // Solo debes tener en cuenta que cada nombre de ruta debe ser único en la aplicación.
    /**
     * @Route("/blog", name="blog_list")
     */
    public function list(): Response
    {
        // ...
    }
    
    /**
     * @Route("/blog", name="show_blog")
     */
    public function show(): Response
    {
        // ...
    }
}
