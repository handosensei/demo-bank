<?php

namespace App\Entity;

class Bank
{
    /**
     * @var array
     */
    private $accounts;

    /**
     * @var string
     */
    private $name;

    public function __construct()
    {
        $this->accounts = array();
    }

    /**
     * @return array
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * @param array $accounts
     */
    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;
    }

    /**
     * @param Account $account
     */
    public function addAccount(Account $account)
    {
        $this->accounts[$account->getNumero()] = $account;
    }

    /**
     * @param Account $accountToRemove
     * @return bool
     */
    public function removeAccount(Account $accountToRemove)
    {
        if (!array_key_exists($accountToRemove->getNumero(), $this->accounts)) {
            return false;
        }

        unset($this->accounts[$accountToRemove->getNumero()]);

        return true;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
