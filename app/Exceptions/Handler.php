<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

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
            if ($e instanceof HttpException) {
                return view('error')
                ->with('code', $e->getCode())
                ->with('message', $e->getMessage());
            }
            //
        });
    }

    protected function renderHttpException(HttpExceptionInterface $e) : Response {
        if ($e instanceof HttpException) {
            $code = $e->getStatusCode();
            $texts = Response::$statusTexts;
            return response(view('error')
            ->with('code', $code)
            ->with(
                'message', 
                array_key_exists($code, $texts) ? Response::$statusTexts[$code] : $e->getMessage())
            ->render());
        }
        return parent::renderHttpException($e);
    }
}
