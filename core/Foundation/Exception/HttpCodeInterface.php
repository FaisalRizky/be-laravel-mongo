<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 18:06
 */

namespace Core\Foundation\Exception;

/**
 * Interface HttpCodeInterface
 *
 * @package Core\Foundation\Exception
 */
interface HttpCodeInterface
{
    const OK = 200;
    const CREATED = 201;
    const ACCEPT = 202;
    const NO_CONTENT = 204;

    const UN_PROCESSABLE_ENTITY = 422;
    const BAD_REQUEST = 400;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const NOT_ACCEPTABLE = 406;
    const UNAUTHORIZED = 401;

    const INTERNAL_SERVER = 500;
}