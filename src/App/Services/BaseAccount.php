<?php

namespace App\Services;

use App\Entity\Account;

abstract class BaseAccount
{
    CONST OVERDRAFT = -100;

    /**
     * @param Account $account
     * @param float $amount
     * @return bool
     */
    public function canDebit(Account $account, $amount)
    {
        return static::OVERDRAFT < $account->getAmount() - $amount;
    }
}
