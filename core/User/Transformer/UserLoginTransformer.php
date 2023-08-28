<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 15:06
 */

namespace Core\User\Transformer;

use League\Fractal\TransformerAbstract;

/**
 * Class UserLoginTransformer
 *
 * @package Core\User\Transformer\UserLoginTransformer
 */
class UserLoginTransformer extends TransformerAbstract
{
    public function transform($response)
    {
        return [
            'status' => 'true',
            'access_token' => $response['access_token'],
            'token_type' => 'Bearer',
        ];
    }
}
