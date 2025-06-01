<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use monApp\models\vehicules;

class VehiculesTest extends TestCase
{
    private $vehicule;

    protected function setUp(): void
    {
        parent::setUp();
        $this->vehicule = new vehicules();
    }

    public function testSettersAndGetters()
    {
        $this->vehicule->setAnnee_vehicule(2023);
        $this->vehicule->setPrix_vehicule(25000);
        $this->vehicule->setDescription_vehicule('Belle voiture');
        $this->vehicule->setKilometrage_vehicule(50000);
        $this->vehicule->setBoite_vitesse_vehicule('Manuelle');
        $this->vehicule->setPuissance_vehicule(110);
        $this->vehicule->setPuissance_fiscale(6);
        $this->vehicule->setImmatriculation_vehicule('AB-123-CD');
        $this->vehicule->setStatut_vehicule('Disponible');

        $this->assertEquals(2023, $this->vehicule->getAnnee_vehicule());
        $this->assertEquals(25000, $this->vehicule->getPrix_vehicule());
        $this->assertEquals('Belle voiture', $this->vehicule->getDescription_vehicule());
        $this->assertEquals(50000, $this->vehicule->getKilometrage_vehicule());
        $this->assertEquals('Manuelle', $this->vehicule->getBoite_vitesse_vehicule());
        $this->assertEquals(110, $this->vehicule->getPuissance_vehicule());
        $this->assertEquals(6, $this->vehicule->getPuissance_fiscale());
        $this->assertEquals('AB-123-CD', $this->vehicule->getImmatriculation_vehicule());
        $this->assertEquals('Disponible', $this->vehicule->getStatut_vehicule());
    }

    public function testBoiteVitesseValidation()
    {
        $this->expectException(\Exception::class);
        $this->vehicule->setBoite_vitesse_vehicule('Invalid');
    }

    public function testBoiteVitesseNormalization()
    {
        $this->vehicule->setBoite_vitesse_vehicule('automatique');
        $this->assertEquals('Automatique', $this->vehicule->getBoite_vitesse_vehicule());

        $this->vehicule->setBoite_vitesse_vehicule('MANUELLE');
        $this->assertEquals('Manuelle', $this->vehicule->getBoite_vitesse_vehicule());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->vehicule = null;
    }
} 