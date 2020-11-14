<?php
// src/Controller/CustomerController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Library para poder utilizar el renderizado de plantilas HTML con Twig
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// para poder redireccionar a otras rutas URL
use Symfony\Component\HttpFoundation\RedirectResponse;

// Para poder utilizar un servicio de login
use Psr\Log\LoggerInterface;

// La clase debe heredad de AbstractController para que funcionen las rutas
class CustomerController extends AbstractController
{
    // a GET request to /user/ returns a list of registered users on a system
    // a POST request to /user/123 creates a user with the ID 123 using the body data
    // a PUT request to /user/123 updates user 123 with the body data
    // a GET request to /user/123 returns the details of user 123
    // a DELETE request to /user/123 deletes user 123

    /**
    * @Route("/index", name="index_customer")
    */
    public function index(): RedirectResponse
    {   
        /* permite redireccionar a otra ruta en este caso a la ruta /read/customer/10
        *  El redirect()método no comprueba su destino de ninguna manera. Si redirige a una URL proporcionada por usuarios finales, 
        *  su aplicación puede estar abierta a la vulnerabilidad de seguridad de redireccionamientos no validados . 
        */
        return $this->redirectToRoute('search_customer', ['id' => 10]);
    }

    /**
    * @Route("/create/customer/{id<\d+>}", methods={"POST"}, name="create_customer")
    */
    public function create(int $id): Response
    {
        return $this->render('customer/show.html.twig', [
            'id' => $id,
        ]);
    }
    
    /**
    * @Route("/read/customer/{id}", methods={"GET"}, name="search_customer")
    */
    public function search(int $id): Response
    {   
        //return $this->generateUrl('custum_url', ['slug' => 'slug-value']);
        return $this->render('customer/show.html.twig', [
            'id' => $id,
        ]);
    }
    
    /**
    * @Route("/login", name="login")
    */
    public function login(LoggerInterface $logger): Response
    {   
        $logger->info('We are logging!');
        /*return $this->render('customer/show.html.twig', [
            'id' => 10,
        ]);*/
    }

    /**
    * @Route("/update/customer/{id}", methods={"PUT"}, name="update_customer")
    */
    public function update(int $id): Response
    {
        return $this->render('customer/show.html.twig', [
            'id' => $id,    
        ]);
    }

    /**
    * @Route("/delete/customer/{id_delet_user}", methods={"DELETE"}, name="delete_customer")
    */
    public function delete(int $id_delet_user): Response
    {
        return $this->render('customer/show.html.twig', [
            'id' => $id,
        ]);
    }
}
