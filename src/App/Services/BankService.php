<?php

namespace App\Services;

use App\Entity\Account;
use App\Entity\Bank;

class BankService
{
    /**
     * @var AccountService
     */
    private $accountService;

    public function __construct()
    {
        $this->accountService = new AccountService();
    }

    /**
     * @param Account $account
     * @param Bank $bank
     * @return bool
     */
    public function createAccount(Account $account, Bank $bank)
    {
        $bank->addAccount($account);

        return true;
    }

    /**
     * @param Account $account
     * @param Bank $bank
     * @return bool
     */
    public function deleteAccount(Account $account, Bank $bank)
    {
        return $bank->removeAccount($account);
    }

    /**
     * @param Account $debitAccount
     * @param Account $creditAccount
     * @param $amount
     * @return bool
     */
    public function transfer(Account $debitAccount, Account $creditAccount, $amount)
    {
        $this->accountService->debit($debitAccount, $amount);
        $this->accountService->credit($creditAccount, $amount);
        return true;
    }
}
