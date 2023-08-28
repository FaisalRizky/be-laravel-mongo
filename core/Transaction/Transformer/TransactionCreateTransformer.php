<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 16:06
 */

namespace Core\Transaction\Transformer;

use League\Fractal\TransformerAbstract;

/**
 * Class TransactionCreateTransformer
 *
 * @package Core\Transaction\Transformer\TransactionCreateTransformer
 */
class TransactionCreateTransformer extends TransformerAbstract
{
    public function transform($response)
    {
        return [
            'status' => 'true',
            'message' => $response['message'],
            'data' => $response['data'],
        ];
    }
}
