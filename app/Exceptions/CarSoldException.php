<?php

namespace App\Exceptions;

use Exception;

class CarSoldException extends Exception
{
    public function __construct(String $message = "", int $code = 0)
    {
        return parent::__construct($message, $code);
    }
}
