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
            'controller_name' => $db["host"],
        ]);
    }

    /**
     * @Route("/create-person", name="create_person")
     */
    public function createPerson(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $person = new Person();
        $person->setNombres(null);
        $person->setApellidos('Chilquinega Quihspe');
        $person->setCi('1722162698');
        $person->setIdPerson('hvjvki678otlg');
        $person->setTipoBanco('Banco ddel Pichincha');

        // Control de errores
        $errors = $validator->validate($person);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        // tell Doctrine you want to (eventually) save the Person (no queries yet)
        $entityManager->persist($person);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new person id '.$person->getId());
    }

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
