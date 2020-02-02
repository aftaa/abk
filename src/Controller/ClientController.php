<?php


namespace App\Controller;


use App\Entity\Client;
use App\Form\ClientType;
use App\Service\ClientManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ClientController extends AbstractController
{
    /**
     * @Route("/client/list", name="client_list", methods={"GET"})
     * @param ClientManagerInterface $clientManager
     * @return Response
     */
    public function index(ClientManagerInterface $clientManager)
    {
        $clients = $clientManager->getClients();

        return $this->render('client/index.html.twig', [
            'clients' => $clients,
        ]);
    }

    /**
     * @Route("/client/create", name="create_client")
     * @param ClientManagerInterface $clientManager
     * @return Response
     */
    public function create(ClientManagerInterface $clientManager)
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client)->createView();

        return $this->render('client/create.html.twig', [
            'form' => $form,
        ]);
    }

}