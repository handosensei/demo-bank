<?php

namespace App\Services;

use App\Entity\Account;
use App\Entity\Bank;

class BankService
{
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
}
