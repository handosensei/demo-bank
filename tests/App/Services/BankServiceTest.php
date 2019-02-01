<?php

namespace Tests\App\Services;

use App\Entity\Account;
use App\Entity\Bank;
use App\Services\AccountInterface;
use App\Services\AccountService;
use App\Services\BankService;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophet;

class BankServiceTest extends TestCase
{
    /**
     * @var BankService
     */
    private $service;

    /**
     * @var Prophet
     */
    private $prophet;

    private $accountServiceMock;

    public function setUp()
    {
        $this->prophet = new \Prophecy\Prophet();
        $this->accountServiceMock = $this->prophet->prophesize(AccountInterface::class);
    }

    /**
     * @test
     */
    public function createAccount()
    {
        $this->service = new BankService($this->accountServiceMock->reveal());
        $result = $this->service->createAccount(new Account(), new Bank());
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function deleteAccount()
    {
        $this->service = new BankService($this->accountServiceMock->reveal());
        $result = $this->service->deleteAccount(new Account(), new Bank());
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function transferOk()
    {
        $this->accountServiceMock->canDebit(Argument::any(), Argument::any())->willReturn(true);
        $this->accountServiceMock->debit(Argument::any(), Argument::any())->willReturn(true);
        $this->accountServiceMock->credit(Argument::any(), Argument::any())->willReturn(true);

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

        $this->service = new BankService($this->accountServiceMock->reveal());
        $result = $this->service->transfer($account1, $account2, 1000);

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function transferKo()
    {
        $this->accountServiceMock->canDebit(Argument::any(), Argument::any())->willReturn(false);

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

        $this->service = new BankService($this->accountServiceMock->reveal());
        $result = $this->service->transfer($account1, $account2, 1000);

        $this->assertFalse($result);
    }

}
