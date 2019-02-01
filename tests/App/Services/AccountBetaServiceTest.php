<?php

namespace Tests\App\Services;

use App\Entity\Account;
use App\Services\AccountBetaService;
use PHPUnit\Framework\TestCase;

class AccountBetaServiceTest extends TestCase
{
    /**
     * @var AccountBetaService
     */
    private $service;

    public function setUp()
    {
        $this->service = new AccountBetaService();
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
        $result = $this->service->credit($account, -1);
        $this->assertTrue($result);

        $result = $this->service->credit($account, 'Pizza');
        $this->assertTrue($result);

        $result = $this->service->credit($account, 50);
        $this->assertTrue($result);
    }
}
