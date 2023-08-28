<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 16:16
 */

namespace Core\User\Transformer;

use League\Fractal\TransformerAbstract;

/**
 * Class UserLogoutTransformer
 *
 * @package Core\User\Transformer\UserLogoutTransformer
 */
class UserLogoutTransformer extends TransformerAbstract
{
    public function transform($response)
    {
        return [
            'status' => 'true',
            'message' => $response['message'],
        ];
    }
}
