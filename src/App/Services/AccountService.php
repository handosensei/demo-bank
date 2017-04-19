<?php

namespace App\Services;

use App\Entity\Account;

class AccountService
{
    /**
     * @param Account $account
     * @param float $amount
     * @return bool
     */
    public function credit(Account $account, $amount)
    {
        $currentAmount = $account->getAmount();
        $account->setAmount($currentAmount + $amount);

        return true;
    }
}
