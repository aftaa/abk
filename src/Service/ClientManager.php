<?php


namespace App\Service;

use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface as Doctrine;
use PhpParser\Comment\Doc;

class ClientManager
{
    /**
     * @var Doctrine
     */
    private $doctrine;

    /**
     * ClientManager constructor.
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getClients()
    {
        $clients = $this->doctrine
            ->getRepository(Client::class)
            ->findAll();
        return $clients;
    }
}