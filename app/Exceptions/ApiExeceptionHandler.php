<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;

class ApiExceptionHandler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return response()->json(['error' => 'Unauthenticated.'], Response::HTTP_UNAUTHORIZED);
    }
}
