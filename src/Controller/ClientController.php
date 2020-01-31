<?php


namespace App\Controller;


use App\Entity\Client;
use App\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client_list", methods={"GET"})
     */
    public function index()
    {
        $clients = $this->getDoctrine()
            ->getRepository(Client::class)
            ->findAll();

        return $this->render('client/index.html.twig', [
            'clients' => $clients,
        ]);
    }

    /**
     * @Route("/client/create", name="create_client")
     */
    public function create()
    {
        $client = new Client();

        $form = $this->createForm(ClientType::class, $client);

        return $this->render('client/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}