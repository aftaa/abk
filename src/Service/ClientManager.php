<?php


namespace App\Service;

use App\Entity\Client;
use App\Form\ClientType;
use Doctrine\ORM\EntityManagerInterface as Doctrine;
use Symfony\Component\Form\FormFactoryBuilder;

class ClientManager implements ClientManagerInterface
{
    /**
     * @var Doctrine
     */
    private $doctrine;

    /**
     * ClientManager constructor.
     *
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return Client[]
     */
    public function getClients(): array
    {
        /** @var Client[] $clients */
        $clients = $this->doctrine
            ->getRepository(Client::class)
            ->findAll();
        return $clients;
    }
}