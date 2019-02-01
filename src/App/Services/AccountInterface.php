<?php

namespace App\Services;

use App\Entity\Account;

interface AccountInterface
{
    /**
     * @param Account $account
     * @param float $amount
     * @return bool
     */
    public function credit(Account $account, $amount);

    /**
     * @param Account $account
     * @param $amount
     * @return bool
     */
    public function canDebit(Account $account, $amount);

    /**
     * @param Account $account
     * @param float $amount
     * @return bool
     */
    public function debit(Account $account, $amount);
}
