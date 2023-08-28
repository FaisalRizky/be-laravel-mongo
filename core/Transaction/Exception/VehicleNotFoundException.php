<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 18:16
 */

namespace Core\Transaction\Exception;

use Core\Foundation\Exception\DisplayableException;

/**
 * Class DisplayableException
 *
 * @package Core\Transaction\Exception\VehicleNotFoundException
 */
class VehicleNotFoundException extends DisplayableException
{
    public function __construct($message = "Vehicle not found", $code = 404, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}