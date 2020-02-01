<?php

namespace App\Service;

use App\Entity\Client;

interface ClientManagerInterface
{
    /**
     * @return Client[]
     */
    public function getClients(): array;
}