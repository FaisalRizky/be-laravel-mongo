<?php

namespace Core\Foundation\Exception;


class HttpRequestException extends DisplayableException
{
  protected $data;

  function __construct($message, $data = [], $code = null)
  {
    parent::__construct($message, $code);

    $this->data = $data;
  }

  public function getData()
  {
    return $this->data;
  }
}