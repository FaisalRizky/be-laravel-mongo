<?php

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:14
 */

namespace Core\Transaction\Service;

/**
 * Interface TransactionServiceInterface
 *
 * @package Core\Transaction\Service\TransactionServiceInterface
 */
interface TransactionServiceInterface
{
    /**
     * @param array $input
     * @return Transaction
     */
    public function createTransaction(array $input);

    /**
     * @param array $input
     * @return Transaction
     */
    public function getSellTransactions(array $input);

        /**
     * @param array $input
     * @return Vehicle
     */
    public function getDetail(array $input);
}