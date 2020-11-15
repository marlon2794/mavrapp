<?php

namespace App\Controller;

use App\Entity\Person;
use Doctrine\ORM\EntityManagerInterface;
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
        $person->setNombres('Dario Jefferson');
        $person->setApellidos('Chilquinega Quihspe');
        $person->setCi('1722162698');
        $person->setIdPerson('hvjvki678otlg');
        $person->setTipoBanco('Banco ddel Pichincha');

        // tell Doctrine you want to (eventually) save the Person (no queries yet)
        $entityManager->persist($person);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new person id '.$person->getId());
    }
}
