<?php

namespace App\Services;

use App\Entity\Account;

class AccountBetaService extends BaseAccount implements AccountInterface
{
    const OVERDRAFT = -2000;

    /**
     * @inheritdoc
     */
    public function credit(Account $account, $amount)
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function debit(Account $account, $amount)
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function canDebit(Account $account, $amount)
    {
        return false;
    }

}
