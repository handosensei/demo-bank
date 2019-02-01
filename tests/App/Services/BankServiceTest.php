<?php

namespace Tests\App\Services;

use App\Entity\Account;
use App\Entity\Bank;
use App\Services\AccountService;
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

    /**
     * @test
     */
    public function transfer()
    {
        $account1 = new Account();
        $account1
            ->setClientName('Jean')
            ->setAmount(1000)
            ->setNumero('7897564123');

        $account2 = new Account();
        $account2
            ->setClientName('Paul')
            ->setAmount(965)
            ->setNumero('2345675');

        $result = $this->service->transfer($account1, $account2, 1000);

        $this->assertTrue($result);
    }
}
