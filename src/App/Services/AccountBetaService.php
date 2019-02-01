<?php

namespace App\Services;

use App\Entity\Account;

class AccountBetaService
{
    public function credit(Account $account, $amount)
    {
        return true;
    }

    public function debit(Account $account, $amount)
    {
        return true;
    }

}
