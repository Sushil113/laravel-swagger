<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Str;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $this->getSanctumErrorMessage($request),
            ], 401);
        }

        return redirect()->guest(route('login'));
    }

    protected function getSanctumErrorMessage($request)
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader) {
            return 'Authorization Token not found';
        }

        if (!Str::startsWith($authHeader, 'Bearer ')) {
            return 'Token is Invalid';
        }
        return 'Token has Expired or is Invalid';
    }
}
