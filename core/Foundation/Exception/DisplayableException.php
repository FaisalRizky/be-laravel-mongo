<?php
declare(strict_types=1);

/**
 * User: isalriz9@gmail.com
 * Date: 27/08/23 18:16
 */

namespace Core\Foundation\Exception;

use App\Exceptions\Handler;

/**
 * Class DisplayableException
 *
 * @package Core\Foundation\Exception
 */
class DisplayableException extends \Exception
{
    protected $contents = [];

    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    protected function setContent($content)
    {
        if (null === $content || is_scalar($content) || is_array($content)) {
            $this->contents[] = $content;
        } elseif (method_exists($content, 'toArray')) {
            $this->contents[] = $content->toArray();
        } else {
            $this->contents = $content;
        }
    }

    public function getContents()
    {
        return $this->contents;
    }
}