<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class CustomizeException extends Exception
{
    public function __construct(
        string $message = 'Recurso no encontrado',
        int $code = Response::HTTP_NOT_FOUND,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function render($request)
    {
        return response()->json([
            'mensaje' => $this->message,
        ], $this->code);
    }
}

