<?php

namespace App\Service;

use App\Entity\Client;

interface ClientManagerInterface
{
    /**
     * @return Client[]
     */
    public function getClients(): array;

    /**
     * @param string $jsonData
     * @return string
     */
    public function createClientJSON(string $jsonData): string;
}
