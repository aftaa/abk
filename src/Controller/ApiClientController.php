<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class ApiClientController extends AbstractController
{
    /**
     * Create a new client.
     *
     * @Route("/api/client/create", name="api_create_client", methods={"POST"})
     * @param Request $request
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function create(Request $request, SerializerInterface $serializer)
    {
        if ($request->isMethod('POST')) {
            $client = $serializer->deserialize($request->getContent(), Client::class, 'json');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            return new Response($serializer->serialize(['success' => true], 'json'));
        }
        return new Response($serializer->serialize(['success' => false], 'json'));
    }
}
