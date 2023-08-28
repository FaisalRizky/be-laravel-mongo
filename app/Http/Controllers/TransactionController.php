<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 28/08/23 05:03
 */

namespace App\Http\Controllers;

use Core\Transaction\Service\Requests\TransactionCreateRequest;
use Core\Transaction\Service\TransactionServiceInterface;
use Core\Foundation\Exception\HttpCodeInterface;
use Core\Transaction\Transformer\TransactionCreateTransformer;

use Illuminate\Http\Request;

/**
 * Class TransactionController
 *
 * @package app\Http\Controllers
 */
class TransactionController extends Controller
{

    /**
     * @var TransactionServiceInterface
     */
    protected $transactionService;

    /**
     * TransactionController constructor.
     *
     * @param TransactionServiceInterface $transactionService
     */
    public function __construct(TransactionServiceInterface $transactionService) 
    {
        $this->transactionService = $transactionService;
    }

    public function createTransaction(TransactionCreateRequest $request) 
    {
        return response()->json((new TransactionCreateTransformer())->transform($this->transactionService->createTransaction($request)), HttpCodeInterface::OK);
    }

    public function getSellTransactions(Request $request) 
    {
        return response()->json((new TransactionCreateTransformer())->transform($this->transactionService->getSellTransactions($request)), HttpCodeInterface::OK);
    }

    public function getDetail(Request $request) 
    {
        return response()->json((new TransactionCreateTransformer())->transform($this->transactionService->getDetail($request)), HttpCodeInterface::OK);
    }

}