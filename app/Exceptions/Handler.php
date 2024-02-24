<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

use App\Services\NavService;

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

    protected function renderHttpException(HttpExceptionInterface $e): Response
    {
        if ($e instanceof HttpException) {
            $code = $e->getStatusCode();
            $texts = Response::$statusTexts;
            $errorView = NavService::error(
                $code, 
                array_key_exists($code, $texts) ? $texts[$code] : $e->getMessage());
            return response($errorView->render());
        }
        return parent::renderHttpException($e);
    }
}
