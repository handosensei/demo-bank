<?php

namespace App\Services;

use App\Entity\Account;

class AccountService extends BaseAccount implements AccountInterface
{
    const OVERDRAFT = -500;

    /**
     * @param Account $account
     * @param float $amount
     * @return bool
     */
    public function credit(Account $account, $amount)
    {
        if (!$this->amountIsValid($amount)) {
            return false;
        }
        $currentAmount = $account->getAmount();
        $account->setAmount($currentAmount + $amount);

        return true;
    }

    /**
     * @param Account $account
     * @param float $amount
     * @return bool
     */
    public function debit(Account $account, $amount)
    {
        if (!$this->amountIsValid($amount)) {
            return false;
        }
        $currentAmount = $account->getAmount();
        $account->setAmount($currentAmount - $amount);

        return true;
    }

    /**
     * @param $amount
     * @return bool
     */
    private function amountIsValid($amount)
    {
        return $amount > 0;
    }
}
