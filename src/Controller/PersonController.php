<?php

namespace App\Controller;

// Mapeo de la clase person.php
use App\Entity\Person;
// para usar ORM en la base de datos
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Validator permite que no vayan valores que por ejemplo si declaramos en la base de datos que sean nulos,
// lo mejor es que no sean nulos
use Symfony\Component\Validator\Validator\ValidatorInterface;

// para poder redireccionar a otras rutas URL
use Symfony\Component\HttpFoundation\RedirectResponse;


class PersonController extends AbstractController
{
    /**
     * @Route("/person", name="person")
     */
    public function index(): Response
    {

        $app_debug_state = (bool) $_SERVER['APP_DEBUG'];
        $app_environment = $_SERVER['APP_ENV'];
        $db_str_connection = $_SERVER['DATABASE_URL'];
        $db = parse_url($db_str_connection);

        $connectionParams = array(
            'url' => $db_str_connection,
        );

        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

        //$var = "var";
        return $this->render('person/index.html.twig', [
            'controller_name' => "",
        ]);
    }

    /**
     * @Route("/person/create-person", name="create_person", methods={"POST"})
     */
    public function createPerson(): Response
    {
        $nombres = $_POST['nombres'];
        return new Response('Create person! ' . $nombres);
    }

    // /**
    //  * @Route("/person/request", name="person_request", methods={"POST"})
    //  */
    // public function requestPerson(): Response
    // {
    //     $nombres = $_POST['nombres'];
    //     return new Response('Create person! ' . $nombres);
    // }

    /**
    * @Route("/person/{id}", name="person_show")
    */
    public function show($id)
    {
        $person = $this->getDoctrine()
            ->getRepository(Person::class)
            ->find($id);

        if (!$person) {
            throw $this->createNotFoundException(
                'No person found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$person->getNombres());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}
