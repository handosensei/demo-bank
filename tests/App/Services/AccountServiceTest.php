<?php

namespace Tests\App\Services;

use App\Entity\Account;
use App\Services\AccountService;
use PHPUnit\Framework\TestCase;

class AccountServiceTest extends TestCase
{
    /**
     * @var AccountService
     */
    private $service;

    public function setUp()
    {
        $this->service = new AccountService();
    }

    /**
     * @test
     */
    public function credit()
    {
        $account = new Account();
        $account
            ->setAmount(1000)
            ->setClientName('Antoine RIDON')
            ->setNumero('67453791')
        ;
        
        $result = $this->service->credit($account, 50);
        $this->assertTrue($result);
    }
}
