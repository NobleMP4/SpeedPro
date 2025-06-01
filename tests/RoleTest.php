<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use monApp\models\role;

class RoleTest extends TestCase
{
    private $role;

    protected function setUp(): void
    {
        parent::setUp();
        $this->role = new role();
    }

    public function testConstructeur()
    {
        $role = new role(1, 'Admin', 'CRUD');
        $this->assertEquals(1, $role->getIdRole());
        $this->assertEquals('Admin', $role->getNomRole());
        $this->assertEquals('CRUD', $role->getDroitsRole());
    }

    public function testSettersAndGetters()
    {
        $this->role->setId_role(1);
        $this->role->setNom_role('Admin');
        $this->role->setDroits_role('CRUD');

        $this->assertEquals(1, $this->role->getId_role());
        $this->assertEquals('Admin', $this->role->getNom_role());
        $this->assertEquals('CRUD', $this->role->getDroits_role());

        // Test des alias des getters
        $this->assertEquals(1, $this->role->getIdRole());
        $this->assertEquals('Admin', $this->role->getNomRole());
        $this->assertEquals('CRUD', $this->role->getDroitsRole());
    }

    public function testGetTable()
    {
        $this->assertEquals('role', role::getTable());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->role = null;
    }
} 