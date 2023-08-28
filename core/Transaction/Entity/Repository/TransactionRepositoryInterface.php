<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:34
 */

namespace Core\Transaction\Entity\Repository;

/**
 * Class TransactionRepositoryInterface
 *
 * @package Core\Transaction\Entity\Repository
 */
interface TransactionRepositoryInterface
{
    /**
     * @param array $request
     * @return Transaction
     */
    public function createTransaction($request);

        /**
     * @param array $request
     * @return Transaction
     */
    public function getSellTransactions($request);

    /**
     * @param array $request
     * @return Vehicle
     */
    public function getDetail($request);

}