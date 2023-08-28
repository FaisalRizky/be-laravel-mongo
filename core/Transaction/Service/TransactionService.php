<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:06
 */

namespace Core\Transaction\Service;

use Core\Foundation\Exception\MessageExceptionInterface;
use Core\Foundation\Exception\HttpCodeInterface;
use Core\Transaction\Entity\Repository\TransactionRepository;
use Core\Transaction\Exception\UserNotFoundException;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class TransactionService
 *
 * @package Core\Transaction\Service\TransactionService
 */
class TransactionService implements TransactionServiceInterface {
    
    /**
     * @var $transactionRepository TransactionRepository
     */
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * @inheritdoc
     */
    public function createTransaction($request) 
    {
        $result = $this->transactionRepository->createTransaction($request);
        return [
            'message' => "Successfully Create Transaction",
            'data'     => $result
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSellTransactions($request) 
    {
        $result = $this->transactionRepository->getSellTransactions($request);
        return [
            'message' => "Successfully Get Selling Transaction",
            'data'     => $result
        ];
    }

    /**
     * @inheritdoc
     */
    public function getDetail($request) 
    {
        $result = $this->transactionRepository->getDetail($request);
        return [
            'message' => "Successfully Get Detail Vehicle",
            'data'     => $result
        ];
    }
}

