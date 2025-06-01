<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use monApp\models\user;
use monApp\core\app;

class UserTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new user();
    }

    public function testSettersAndGetters()
    {
        $this->user->setNomUser('Dupont');
        $this->user->setPrenomUser('Jean');
        $this->user->setLoginUser('jdupont');
        $this->user->setEmailUser('jean.dupont@example.com');
        $this->user->setMdpUser('password123');
        $this->user->setIdRoleUser(1);

        $this->assertEquals('Dupont', $this->user->getNomUser());
        $this->assertEquals('Jean', $this->user->getPrenomUser());
        $this->assertEquals('jdupont', $this->user->getLoginUser());
        $this->assertEquals('jean.dupont@example.com', $this->user->getEmailUser());
        $this->assertEquals('password123', $this->user->getMdpUser());
        $this->assertEquals(1, $this->user->getIdRoleUser());
    }

    public function testGetTable()
    {
        $this->assertEquals('user', user::getTable());
    }

    public function testUserCreation()
    {
        $user = new user();
        $this->assertInstanceOf(user::class, $user);
        $this->assertNull($user->getIdUser());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->user = null;
    }
} 