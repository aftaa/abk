<?php


namespace App\Controller;


use App\Entity\Client;
use App\Form\ClientType;
use App\Service\ClientManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ClientController extends AbstractController
{
    /**
     * @Route("/client/list", name="client_list", methods={"GET"})
     * @param ClientManager $clientManager
     * @return Response
     */
    public function index(ClientManager $clientManager)
    {
        $clients = $clientManager->getClients();

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