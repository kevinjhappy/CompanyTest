<?php

namespace App\Exception;

class InvalidCompanyException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}