<?php


namespace App\Service;

use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ClientManager implements ClientManagerInterface
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var EntityManagerInterface */
    private $entityManager;

    /**
     * ClientManager constructor.
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        SerializerInterface $serializer,
        EntityManagerInterface $entityManager)
    {
        $this->serializer = $serializer;
        $this->entityManager = $entityManager;
    }

    /**
     * @return Client[]
     */
    public function getClients(): array
    {
        /** @var Client[] $clients */
        $clients = $this->entityManager->getRepository(Client::class)->findAll();
        return $clients;
    }

    /**
     * @param string $jsonData
     * @return string
     */
    public function createClientJSON(string $jsonData): string
    {
        $client = $this->serializer->deserialize($jsonData, Client::class, 'json');
        $this->entityManager->persist($client);
        $this->entityManager->flush();
        return $this->serializer->serialize(['success' => true], 'json');
    }
}
