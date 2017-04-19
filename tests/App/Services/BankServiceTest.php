<?php

namespace Tests\App\Services;

use App\Entity\Account;
use App\Entity\Bank;
use App\Services\BankService;
use PHPUnit\Framework\TestCase;

class BankServiceTest extends TestCase
{
    /**
     * @var BankService
     */
    private $service;

    public function setUp()
    {
        $this->service = new BankService();
    }

    /**
     * @test
     */
    public function createAccount()
    {
        $result = $this->service->createAccount(new Account(), new Bank());
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function deleteAccount()
    {
        $result = $this->service->deleteAccount(new Account(), new Bank());
        $this->assertFalse($result);
    }
}
