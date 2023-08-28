<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 18:16
 */

namespace Core\User\Exception;

use Core\Foundation\Exception\DisplayableException;

/**
 * Class DisplayableException
 *
 * @package Core\User\Exception\UserNotFoundException
 */
class UserNotFoundException extends DisplayableException
{
    public function __construct($message = "User not found", $code = 404, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}