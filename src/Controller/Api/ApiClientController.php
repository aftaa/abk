<?php

namespace App\Controller\Api;

use App\Service\ClientManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiClientController extends AbstractController
{
    /** @var ClientManagerInterface */
    private $clientManager;

    /**
     * ApiClientController constructor.
     * @param ClientManagerInterface $clientManager
     */
    public function __construct(ClientManagerInterface $clientManager)
    {
        $this->clientManager = $clientManager;
    }



    /**
     * Create a new client.
     *
     * @Route("/api/client/create", name="api_create_client", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $createResultJSON = $this->clientManager->createClientJSON($request->getContent());
            $response = new Response($createResultJSON);
            $response->headers->set('Access-Control-Allow-Origin', '*');
            return $response;
        }
    }
}
