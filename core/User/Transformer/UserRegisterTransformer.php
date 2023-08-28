<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 16:06
 */

namespace Core\User\Transformer;

use League\Fractal\TransformerAbstract;

/**
 * Class UserRegisterTransformer
 *
 * @package Core\User\Transformer\UserRegisterTransformer
 */
class UserRegisterTransformer extends TransformerAbstract
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
