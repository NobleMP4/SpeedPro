<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use monApp\models\clients;

class ClientsTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new clients();
    }

    public function testSettersAndGetters()
    {
        $this->client->setNom_client_1('Dupont');
        $this->client->setPrenom_client_1('Jean');
        $this->client->setEmail_client_1('jean.dupont@example.com');
        $this->client->setTelephone_client_1('0612345678');
        $this->client->setRue('123 rue de Paris');
        $this->client->setCode_postal('75001');
        $this->client->setVille('Paris');
        $this->client->setPays('France');

        $this->assertEquals('Dupont', $this->client->getNom_client_1());
        $this->assertEquals('Jean', $this->client->getPrenom_client_1());
        $this->assertEquals('jean.dupont@example.com', $this->client->getEmail_client_1());
        $this->assertEquals('06 12 34 56 78 ', $this->client->getTelephone_client_1());
        $this->assertEquals('123 rue de Paris', $this->client->getRue());
        $this->assertEquals('75001', $this->client->getCode_postal());
        $this->assertEquals('Paris', $this->client->getVille());
        $this->assertEquals('France', $this->client->getPays());
    }

    public function testFormatPhoneNumber()
    {
        $this->client->setTelephone_client_1('0612345678');
        $this->assertEquals('06 12 34 56 78 ', $this->client->getTelephone_client_1());

        $this->client->setTelephone_client_1('33612345678');
        $this->assertEquals('06 12 34 56 78 ', $this->client->getTelephone_client_1());

        $this->client->setTelephone_client_1('+33612345678');
        $this->assertEquals('06 12 34 56 78 ', $this->client->getTelephone_client_1());
    }

    public function testGetAdresseComplete()
    {
        $this->client->setRue('123 rue de Paris');
        $this->client->setCode_postal('75001');
        $this->client->setVille('Paris');
        $this->client->setPays('France');

        $adresseAttendue = '123 rue de Paris, 75001 Paris, France';
        $this->assertEquals($adresseAttendue, $this->client->getAdresseComplete());
    }

    public function testGetTable()
    {
        $this->assertEquals('clients', clients::getTable());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->client = null;
    }
} 